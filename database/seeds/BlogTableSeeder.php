<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new Blog();
        $blog->id = 1;
        $blog->title = 'MU';
        $blog->content = 'Tin tức về các cầu thủ';
        $blog->category_id = 1;
        $blog->save();

        $blog = new Blog();
        $blog->id = 2;
        $blog->title = 'Bộ Giáo Dục';
        $blog->content = 'Tin tức về bộ giáo dục';
        $blog->category_id = 2;
        $blog->save();

        $blog = new Blog();
        $blog->id = 3;
        $blog->title = 'Arsenal';
        $blog->content = 'Tin tức về các cầu thủ';
        $blog->category_id = 1;
        $blog->save();
    }
}
