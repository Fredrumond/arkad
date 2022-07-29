<?php

namespace App\Services;

use Fredrumond\ArkadCrawler\Service\ArkadCrawlerService as ArkadCrawler;

class ArkadCrawlerService
{
    private $crawler;

    public function __construct($config)
    {
        $this->crawler = new ArkadCrawler($config);
    }

    public function search()
    {
        return $this->crawler->search();
    }
}