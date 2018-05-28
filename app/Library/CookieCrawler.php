<?php

namespace App\Library;

use App\Library\Crawler;

class CookieCrawler extends Crawler{
    
    public function getCookies($uri)
    {
        $ch = curl_init($uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);        // get cookie
        $cookies = array();
        foreach($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }
        return $cookies;
    }
    
    public function run()
    {
        $this->crawl_page($this->_url, $this->_depth);
        $allCookies = [];
        foreach($this->_seen as $url => $status)
        {
            $cookies = $this->getCookies($url);
            foreach($cookies as $cookieName => $cookieValue)
            {
                $allCookies[$cookieName] = $cookieValue;
            }
        }
        return $allCookies;
    }
}