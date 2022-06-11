<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('curlRequest')) {
    function curlRequest($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
}
