<?php

namespace App\Utils;

Class FetchService
{

    public static function updateToken($token)
    {
        $tokenFile = fopen('token.txt', 'w');
        fwrite($tokenFile, $token);
        fclose($tokenFile);
    }

    public static function getToken()
    {
        $tokenFile = fopen('token.txt', 'r');
        $token = fread($tokenFile, max(filesize('token.txt'), 1));
        fclose($tokenFile);
        return $token;
    }

    public static function getAuthUrl()
    {
        $client_id = "f368a9bab5e4426c996b1859340f144e";
        $redirect_uri = "https://n.abdollahi.hinzaco.com/token";

        return "https://api.instagram.com/oauth/authorize/?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code&scope=basic+public_content";
    }

    public static function access_token($code)
    {
        $curl = curl_init();
        $client_id = "f368a9bab5e4426c996b1859340f144e";
        $redirect_uri = "https://n.abdollahi.hinzaco.com/token";

        csrf_field();
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
        $result = json_decode($result);
        $access_token = $result->access_token;
        curl_close($curl);
        return $access_token;

    }

    /**
     * @param $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function fetch($tag)
    {
        $access_token = self::getToken();
        $url = "https://api.instagram.com/v1/tags/$tag/media/recent?access_token=$access_token";

        $curl = curl_init();

        // POST method for receiving access_token
        curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
            )
        );
        $result = curl_exec($curl);
        $images = [];
        foreach (json_decode($result)->data as $data) {
            $image_url = $data->images->standard_resolution->url;
            $image_link = $data->link;
            $images [] = ['image' => $image_url, 'link' => $image_link];
        }

        curl_close($curl);
        return $images;
    }
}
