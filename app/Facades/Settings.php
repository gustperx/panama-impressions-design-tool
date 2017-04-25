<?php

namespace App\Facades;

use App\Modules\Config\Basic\Config;
use App\Modules\Config\Generals\General;
use App\Modules\Config\Socials\Link;

class Settings
{
    private $config;

    private $link;
   
    private $general;

    public function __construct(Config $config, General $general, Link $link)
    {
        $this->config = $config;
        $this->link = $link;
        $this->general = $general;
    }

    public function getConfig()
    {
        return $this->config->first();
    }

    public function getSocials()
    {
        return $this->link->with('social')->get();
    }
    
    public function getGeneralConfig()
    {
        return $this->general->first();
    }
}