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

//function getInstagramPosts()
//{
//    //    CONFIG
//    $access_token = "2708348125.1677ed0.20f28aa2d235402393fe21b713f63828";
//    $howManyToDisplay = $_GET['how_many'];
//    $minToRetrieve = $_GET['from'] * $howManyToDisplay + $howManyToDisplay;
//    $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
//    $json_link .= "access_token={$access_token}&count={$minToRetrieve}";
//    // END OF CONFIG
//
//    $json = file_get_contents($json_link);
//    $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
//
//    $posts = array_slice($obj['data'], $_GET['from'], $howManyToDisplay);
//
//    foreach ($posts as $key => $post) {
//        $postArray[$key] = [
//            "image" => $post['images']['low_resolution']['url'],
//            "type" => 'instagram',
//            "url" => $post['link']
//        ];
//    }
//
//    // return result as json
//    $json_result = json_encode($postArray);
//    die($json_result);
//}

function getInstagramPosts()
{
//    CONFIG
    $access_token = "1114712806.1677ed0.69b2ddae58694440888e9beb37769a47";
    $howManyToRetrieve = $_GET['how_many'];
    $minToRetrieve = $_GET['itemsRetrieved'] + $_GET['how_many'];
    $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
    $json_link .= "access_token={$access_token}&count=33";
    // END OF CONFIG

    $response = [];
    $cache = dirname(__FILE__) . '/cache/' . 'cache-instagram.json';

    if (file_exists($cache) && (filemtime($cache) > (time() - 60 * 60))) {
        $response = file_get_contents($cache);
    } else {
        $finalFile = [];
        //request do API
        $lastRetrieved = null;
        $data = null;

        for ($i = 0; $i < 3; $i++) {
            if ($lastRetrieved === null) {
                $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
                $json_link .= "access_token={$access_token}&count=33";
            } else {
                $json_link = $lastRetrieved['pagination']['next_url'];
            }

            $retrieved = json_decode(file_get_contents($json_link), true, 512, JSON_BIGINT_AS_STRING);
            $data = $retrieved['data'];
            $temp = $finalFile;

            $finalFile = array_merge($temp, $data);
            $lastRetrieved = $retrieved;
        }

        $finalDataArray = ['data' => $finalFile];
        $finalDecoded = json_encode($finalDataArray);

        $response = file_put_contents($cache, $finalDecoded);
    }

    $obj = json_decode($response, true, 512, JSON_BIGINT_AS_STRING);

    $posts = array_slice($obj['data'], $_GET['itemsRetrieved'], $howManyToRetrieve);

    foreach ($posts as $key => $post) {
        $postArray[$key] = [
            "image" => $post['images']['standard_resolution']['url'],
            "type" => 'instagram',
            "url" => $post['link'],
            "id" => $post['id'],
            "profile_picture" => $post['user']['profile_picture'],
            "full_name" => $post['user']['full_name'],
            "username" => $post['user']['username'],
            "text" => $post['caption']['text'],
            "video_url" => $post['videos']['standard_resolution']['url'],
            "video_width" => $post['videos']['standard_resolution']['width'],
            "video_height" => $post['videos']['standard_resolution']['height'],
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


