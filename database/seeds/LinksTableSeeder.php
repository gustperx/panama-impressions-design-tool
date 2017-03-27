<?php

use App\Models\Config\Link;
use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            ['social_id' => 1, 'url' => 'https://www.facebook.com/'],
            ['social_id' => 2, 'url' => 'https://twitter.com/'],
            ['social_id' => 4, 'url' => 'https://es.linkedin.com/in/'],
            ['social_id' => 5, 'url' => 'https://www.instagram.com/'],
            ['social_id' => 7, 'url' => 'https://www.github.com/'],
        ];

        foreach ($links as $link)
        {
            Link::create($link);
        }
    }
}
