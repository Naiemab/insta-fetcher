<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

Class FetchService
{


    /**
     * @param $token
     */
    // Modify token ( if needed ) and update it
    public static function updateToken($token)
    {
        Storage::disk('local')->put('token.txt', $token);
    }


    /**
     * @return mixed
     */
    // Read token from database
    public static function getToken()
    {
        $token = Storage::disk('local')->get('token.txt');
        return $token;
    }


    /**
     * @return string
     */
    // pass user to instagram authentication page
    public static function getAuthUrl()
    {
        $client_id = env('INSTAGRAM_CLIENT_ID');
        $redirect_uri = env("REDIRECT_URI");

        return "https://api.instagram.com/oauth/authorize/?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code&scope=basic+public_content";
    }


    /**
     * @param $code
     * @return mixed
     */
    // get access token with received code in getAuthUrl
    public static function access_token($code)
    {
        $curl = curl_init();
        $client_id = env('INSTAGRAM_CLIENT_ID');
        $redirect_uri = env("REDIRECT_URI");

        csrf_field();
        $client_secret = env('INSTAGRAM_CLIENT_SECRET');

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
     * @return array
     */
    // Get Fetched images with specific tag
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
