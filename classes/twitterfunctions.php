<?php
namespace classes;

class twitterfunctions{
    public static function get_field($url, $getfield, $settings){
        $url_base= 'https://api.twitter.com/1.1/';
        $url_base .= $url;
        $requestMethod = 'GET';
        $twitter = new\Classes\Libs\TwitterAPIExchange($settings);
        $twitter->setGetfield($getfield);
        $twitter->buildOauth($url_base, $requestMethod);
        $twitter_results=$twitter->performRequest();
        return json_decode($twitter_results, TRUE);
        return $twitter_results;
  }

    public static function post_field($url, $postfield, $settings){
        $url_base= 'https://api.twitter.com/1.1/';
        $url_base .= $url;
        $requestMethod = 'POST';
        $twitter = new\classes\libs\TwitterAPIExchange($settings);
        $twitter->buildOauth($url_base, $requestMethod);
        $twitter->setPostfields($postfield);
        $twitter_results=$twitter->performRequest();
        return json_decode($twitter_results);
    }
}
?>
