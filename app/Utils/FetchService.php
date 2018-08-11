<?php

namespace App\Utils\FetchService;

// code for access_token = d83bc59f7e6e4a92a121be365cbc2beb

Class FetchService {
    /**
     * @param $tag
     * @return mixed
     */
    static public function fetch($tag)
        {
            $curl = curl_init();
            $access_token ="675620457.f368a9b.1534ad0582a44b9e998910f5fcf1c0b7";
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => "https://api.instagram.com/v1/tags/$tag/media/recent?access_token=$access_token",
            ));
            $resp = curl_exec($curl);
         curl_close($curl);
          return $resp;
        }


    static public function token()
    {
        $curl = curl_init();
         $client_id = "f368a9bab5e4426c996b1859340f144e";
         $redirect_uri = "http://botenarium.com";

         // GET method for receiving code
         curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://api.instagram.com/oauth/authorize/?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code",
         ));

         $code = curl_exec($curl); // it is a code we need to send it to instagram for access_token

         $client_secret = "f2a78d0ba0af498cb947d26b7035571c";

         // POST method for receiving access_token
         curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.instagram.com/oauth/access_token',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                "client_id" => $client_id,
                "client_secret" => $client_secret,
                "grant_type" => "authorization_code",
                "redirect_uri" => $redirect_uri,
                "code" => $code,
            )
         ));

         $result = curl_exec($curl);

         var_dump($result);
//        $access_token = $result->access_token;
//        curl_close($curl);
//        return $access_token;

    }
}
