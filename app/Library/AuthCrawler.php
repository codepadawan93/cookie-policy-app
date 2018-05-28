<?php

namespace App\Library;

use App\Library\Crawler;

class AuthCrawler extends Crawler{

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