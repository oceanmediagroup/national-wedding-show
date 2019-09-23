<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 18/06/2018
 * Time: 14:55
 */

require(__DIR__ . '/TweetPHP.php');

//use GuzzleHttp\Client;

//register myAction with wordpress
add_action('wp_ajax_nopriv_getPosts', 'getPosts');
add_action('wp_ajax_getPosts', 'getPosts');

add_action('wp_ajax_nopriv_getTwitterPosts', 'getTwitterPosts');
add_action('wp_ajax_getTwitterPosts', 'getTwitterPosts');

add_action('wp_ajax_nopriv_getInstagramPosts', 'getInstagramPosts');
add_action('wp_ajax_getInstagramPosts', 'getInstagramPosts');

add_action('wp_ajax_nopriv_getTutorials', 'getTutorials');
add_action('wp_ajax_getTutorials', 'getTutorials');

add_action('wp_ajax_nopriv_getTextPosts', 'getTextPosts');
add_action('wp_ajax_getTextPosts', 'getTextPosts');


add_action('wp_ajax_nopriv_getSingleTutorial', 'getSingleTutorial');
add_action('wp_ajax_getSingleTutorial', 'getSingleTutorial');


function getPosts()
{
    $howManyToRetrieve = $_GET['how_many'];

    $post_args = array(
        'post_type' => 'post',
        'numberposts' => -1,
        'category__not_in' => 6,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts = get_posts($post_args);

    if (($_GET['itemsRetrieved'] + $howManyToRetrieve) > count($posts)) {
        die(null);
    }

    $posts = array_slice($posts, $_GET['itemsRetrieved'], $howManyToRetrieve);

    foreach ($posts as $key => $post) {
        $category = get_the_category($post->ID);
        $image = get_the_post_thumbnail_url($post->ID, 'post-thumbnail');
        $date = get_the_date('d M Y', $post->ID);

        $postArray[$key] = [
            "title" => $post->post_title,
            "content" => $post->post_excerpt,
            "image" => $image,
            "type" => 'post',
            "category" => $category,
            "date" => $date,
            "url" => get_permalink($post->ID),
            "id" => $post->ID
        ];
    }

    // return result as json
    $json_result = json_encode($postArray);

    die($json_result);
}

function getTwitterPosts()
{
    $howManyToDisplay = $_GET['how_many'];
    $minToRetrieve = (int)$_GET['itemsRetrieved'] + (int)$howManyToDisplay;

//    var_dump("minimum to retrieve is going to be: " . $minToRetrieve);

    $TweetPHP = new TweetPHP(array(
        'consumer_key' => '14WM9MS1r6Sf4rm1KpX6T9HLd',
        'consumer_secret' => 'PNaK6KAfywdYFcnXM5qQKWHQ1tgdJzfrn834cVpFEb5YQ6Gm7N',
        'access_token' => '47293325-IvTsimc12aJBEKtw4ZzJXk0RBGpiEixEQF0Ls1H2w',
        'access_token_secret' => 'dwjC4BT1q4sEYqgnVYWX0JAPSFSnQIklWTSuNL63bUwOm',
        'tweets_to_retrieve' => 100,
        'tweets_to_display' => $minToRetrieve,
        'enable_cache' => true,
        'cache_dir' => dirname(__FILE__) . '/cache/', // Where on the server to save cached tweets
        'cachetime' => 60 * 60, // Seconds to cache feed (1 hour).
        'ignore_replies' => false,
        'ignore_retweets' => false,
        'api_endpoint' => 'statuses/user_timeline',
        'api_params' => array('screen_name' => 'nationalwedding',
            'tweet_mode' => 'extended')
    ));

    $tweets = $TweetPHP->get_tweet_array();

    $slicefrom = (int)$_GET['itemsRetrieved'];

    $posts = array_slice($tweets, $slicefrom, $howManyToDisplay);

    die(json_encode($posts));
}

set_time_limit(0);
date_default_timezone_set('UTC');

function getInstagramPosts()
{
    $howManyToRetrieve = isset($_GET['how_many']) ? $_GET['how_many'] : 1;
    $minToRetrieve = isset($_GET['itemsRetrieved']) && isset($_GET['how_many']) ? $_GET['itemsRetrieved'] + $_GET['how_many'] : 1;
    $json_link = 'https://www.instagram.com/thenationalweddingshow/?__a=1';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $json_link);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($ch);
    $res_json = json_decode($res);

    $post_data = $res_json->graphql->user->edge_owner_to_timeline_media->edges;

    $user = $res_json->graphql->user;
    $user_data = array(
        'profile_picture' => $user->profile_pic_url,
        'full_name' => $user->full_name,
        'username' => $user->username
    );

    $posts = array_slice($post_data, isset($_GET['itemsRetrieved']) ? $_GET['itemsRetrieved'] : 1, $howManyToRetrieve);

    $postArray = array();

    foreach ($posts as $key => $post) {
        $postArray[$key] = [
            "image" => $post->node->thumbnail_src,
            "type" => 'instagram',
            "url" => 'https://www.instagram.com/p/' . $post->node->shortcode,
            "pid" => $post->node->shortcode,
            "id" => $post->node->id,
            "profile_picture" => $user_data['profile_picture'],
            "full_name" => $user_data['full_name'],
            "username" => $user_data['username'],
            "text" => $post->node->edge_media_to_caption->edges[0]->node->text,
            "video_url" => null
        ];
    }

    $json_result = json_encode($postArray);

    if ($howManyToRetrieve !== 1) {
        die($json_result);
    } else {
        return $postArray[0];
    }
}


function getTutorials()
{
    $howManyToRetrieve = $_GET['how_many'];

    $post_args = array(
        'post_type' => 'tutorials',
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts = get_posts($post_args);

    if (($_GET['itemsRetrieved'] + $howManyToRetrieve) > count($posts)) {
        die(null);
    }

    $posts = array_slice($posts, $_GET['itemsRetrieved'], $howManyToRetrieve);

    foreach ($posts as $key => $post) {
        $video = get_field('tutorial_video_link', $post->ID);

        $postArray[$key] = [
            "title" => $post->post_title,
            "type" => 'tutorial',
            "video" => $video,
            "text" => $post->post_content,
            "id" => $post->ID
        ];
    }

    // return result as json
    $json_result = json_encode($postArray);

    die($json_result);
}


function getSingleTutorial()
{
    $id = $_GET['id'];

    $post_args = array(
        'post_type' => 'tutorials',
        'numberposts' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__in' => array($id)
    );

    $posts = get_posts($post_args);

    if (!$posts) die(null);

    foreach ($posts as $key => $post) {
        $video = get_field('tutorial_video_link', $post->ID);

        $postArray[$key] = [
            "title" => $post->post_title,
            "type" => 'tutorial',
            "video" => $video,
            "text" => $post->post_content,
            "id" => $post->ID
        ];
    }

    // return result as json
    $json_result = json_encode($postArray);

    die($json_result);
}


function getTextPosts()
{
    $howManyToRetrieve = $_GET['how_many'];

    $post_args = array(
        'post_type' => 'post',
        'category' => 6,
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts = get_posts($post_args);

    if (($_GET['itemsRetrieved'] + $howManyToRetrieve) > count($posts)) {
        die(null);
    }

    $posts = array_slice($posts, $_GET['itemsRetrieved'], $howManyToRetrieve);

    foreach ($posts as $key => $post) {

        $postArray[$key] = [
            "title" => $post->post_title,
            "content" => $post->post_excerpt,
            "type" => 'text',
            "url" => get_permalink($post->ID),
            "id" => $post->ID
        ];
    }

    // return result as json
    $json_result = json_encode($postArray);

    die($json_result);
}


