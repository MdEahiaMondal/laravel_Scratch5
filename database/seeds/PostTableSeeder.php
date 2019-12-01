<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('posts')->insert([
            [
                'user_id' => '1',
                'category_id' => '2',
                'title' => 'Featured post',
                'content' => 'This is a wider card with supporting text below as a natural lead-in to additional content.',
                'thumnbnail_path' => 'https://avatars3.githubusercontent.com/u/55204970?s=400&u=914072ca93d80b512a68387934bcfa97af7de152&v=4',
                'status' => 'draft',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'category_id' => '1',
                'title' => 'Post title',
                'content' => 'This is a wider card with supporting text below as a natural lead-in to additional content.',
                'thumnbnail_path' => 'https://avatars3.githubusercontent.com/u/55204970?s=400&u=914072ca93d80b512a68387934bcfa97af7de152&v=4',
                'status' => 'draft',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
