<?php

use App\Modules\Config\Socials\Social;
use Illuminate\Database\Seeder;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [

            ['name' => 'Facebook',    'icon' => 'facebook',    'color' => '#3B5998'],
            ['name' => 'Twitter',     'icon' => 'twitter',     'color' => '#007BB6'],
            ['name' => 'Google Plus', 'icon' => 'google-plus', 'color' => '#C40807'],
            ['name' => 'Linkedin',    'icon' => 'linkedin',    'color' => '#007BB6'],
            ['name' => 'Instagram',   'icon' => 'instagram',   'color' => '#C30093'],
            ['name' => 'Youtube',     'icon' => 'youtube',     'color' => '#C40807'],
            ['name' => 'Github',      'icon' => 'github-alt',  'color' => '#757b87'],
            ['name' => 'skype',       'icon' => 'skype',       'color' => '#2E2EFE'],
            ['name' => 'rss',         'icon' => 'rss',         'color' => '#FFBF00'],

        ];

        foreach ($socials as $social)
        {
            Social::create($social);
        }

    }
}
