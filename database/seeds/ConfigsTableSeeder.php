<?php

use App\Models\Config\Config;
use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'name'        => 'Name App',
            'logo'        => '/assets/images/logos/default_login_logo.png',
            'logo_header' => '/assets/images/logos/default_header_logo.png',
            'background'  => '/assets/images/backgrounds/default_background.png',
            'favicon'     => '/assets/images/favicon/default_favicon.png',
            'home'        => 'web.home',
            'email'       => 'info@domain.com',
            'phone_one'   => '555-1234567',
            'phone_two'   => '555-1234567'
        ]);
    }
}
