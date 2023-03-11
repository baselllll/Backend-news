<?php

namespace App\helpers;

trait NewsApiHelper {

    public function news_api($data_source){
        if($data_source=="News_api"){
            $url = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey=252076477cda4883a32fefdc5b975ef9";
           return $this->CurlWeb($url);
        }
        if($data_source=="BBC_News_api"){

            $url = "https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=252076477cda4883a32fefdc5b975ef9";
            return $this->CurlWeb($url);
        }
        if($data_source=="bitcoin_news_us"){
            $url = "https://newsapi.org/v2/everything?q=bitcoin&apiKey=252076477cda4883a32fefdc5b975ef9";
            return $this->CurlWeb($url);
        }
    }

    public function CurlWeb($url){
        $c = curl_init();
        curl_setopt( $c , CURLOPT_URL , $url);
        curl_setopt( $c , CURLOPT_USERAGENT, "Mozilla/5.0 (Linux Centos 7;) Chrome/74.0.3729.169 Safari/537.36");
        curl_setopt( $c , CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $c , CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt( $c , CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt( $c , CURLOPT_TIMEOUT, 10000); // 10 sec
        $data = curl_exec($c);
        curl_close($c);
        $result = json_decode($data);
        return $result;
    }

}
