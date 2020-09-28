<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'title' => 'Judul pertama',
                'body' => 'body judul pertama',
            ],
            [
                'title' => 'Judul kedua',
                'body' => 'body judul kedua',
            ],
            [
                'title' => 'Judul ketiga',
                'body' => 'body judul ketiga',
            ],
            [
                'title' => 'Judul keempat',
                'body' => 'body judul keempat',
            ],
            [
                'title' => 'Judul kelima',
                'body' => 'body judul kelima',
            ]
        ]);
    }
}
