<?php
namespace classes;

class curlFunction{
    public static function Import($text){
        $search_host = '192.168.1.16';
        $search_port = '9200';
        $index = 'twitter_final';
        $doc_type = 'tweet_data';
            /*$json_doc = array(
                        "user" => "mikerogo13",
                        "post_date" => "2012-11-15T14:12:12",
                        "message" => "trying out Elastic Search"
                    );*/
            $json_doc = json_encode($text);
            $baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/'.$doc_type .'/';
            $ci = curl_init();
            curl_setopt($ci, CURLOPT_URL, $baseUri);
            curl_setopt($ci, CURLOPT_PORT, $search_port);
            curl_setopt($ci, CURLOPT_TIMEOUT, 200);
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ci, CURLOPT_FORBID_REUSE, 0);
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ci, CURLOPT_POSTFIELDS, $json_doc);
            $response = curl_exec($ci);
            return $response;
  }
  
  public static function Search($term){
      $search_host = '192.168.1.16';
      $search_port = '9200';
      $index = 'twitter_final';
      $doc_type = 'tweet_data';
       
          //$json_doc = json_encode($json_doc);
          $baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/_search?q=text:'. $term;
          $ci = curl_init();
          curl_setopt($ci, CURLOPT_URL, $baseUri);
          curl_setopt($ci, CURLOPT_PORT, $search_port);
          curl_setopt($ci, CURLOPT_TIMEOUT, 200);
          curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ci, CURLOPT_FORBID_REUSE, 0);
          curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'GET');
          $response = curl_exec($ci);
          return(json_decode($response,TRUE));
  }
  
  public static function jsonSearch($term){
      //$es = new Elasticsearch\Client();
      $params['index'] = 'twitter';
      $params['type']  = 'drone';
      $params['body']['query']['match']['tweet'] = $q;
      $client = new Elasticsearch\Client();
      $results2 = $client->search($params);
      //print_r($results2);
      $array_tweet = array();
        foreach($results2['hits']['hits'] as $hits){
            //print_r($hits);
            foreach($hits['_source'] as $message){
                $array_tweet[] = $message;
                echo $message . '<br>';
            }
        }
        print_r($array_tweet);
  }
}
?>
