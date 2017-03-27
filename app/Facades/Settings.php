<?php

namespace App\Facades;

use App\Models\Config\Config;
use App\Models\Config\Link;

class Settings
{
    private $config;

    private $link;

    public function __construct(Config $config, Link $link)
    {
        $this->config = $config;
        $this->link = $link;
    }

    public function getConfig()
    {
        return $this->config->first();
    }

    public function getSocials()
    {
        return $this->link->with('social')->get();
    }
}