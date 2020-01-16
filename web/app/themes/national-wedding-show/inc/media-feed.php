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
        'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
        'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET'),
        'access_token' => getenv('TWITTER_ACCESS_TOKEN'),
        'access_token_secret' => getenv('TWITTER_TOKEN_SECRET'),
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
//    CONFIG
    $access_token = getenv('INSTAGRAM_ACCESS_TOKEN');
    $user_id = getenv('INSTAGRAM_USER_ID');
    $howManyToRetrieve = isset( $_GET['how_many'] ) ? $_GET['how_many'] : null;
    $minToRetrieve = ( isset( $_GET['itemsRetrieved'] ) && isset( $_GET['how_many'] ) ) ? $_GET['itemsRetrieved'] + $_GET['how_many'] : 1;
    $json_url ="https://graph.facebook.com/$user_id/media?fields=id,shortcode,media_url,thumbnail_url&access_token=$access_token";

    $response = [];
    $cache = dirname(__FILE__) . '/cache/' . 'cache-instagram.json';

    if (file_exists($cache) && (filemtime($cache) > (time() - 60 * 60))) {
        $response = json_decode(file_get_contents($cache));
    } else {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $json_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);

        $response = json_decode($res);

        $file = file_put_contents($cache, $res);
    }

    $itemsRetrieved = isset( $_GET['itemsRetrieved'] ) ? $_GET['itemsRetrieved'] : null;

    $posts = array_slice($response->data, $itemsRetrieved, $howManyToRetrieve);

    foreach ($posts as $key => $post) {
        $postArray[$key] = [
            "image" => $post->media_url,
            "type" => 'instagram',
            "url" => 'https://instagram.com/p/' . $post->shortcode,
            "id" => $post->id,
            "shortcode" => $post->shortcode,
            "thumbnail_url" => isset($post->thumbnail_url) ? $post->thumbnail_url : null
        ];
    }

    // return result as json
    $json_result = json_encode($postArray);

    if ($howManyToRetrieve) {
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


