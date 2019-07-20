<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->id = 1;
        $category->name = 'Sport';
        $category->save();

        $category = new Category();
        $category->id = 2;
        $category->name = 'Education';
        $category->save();

        $category = new Category();
        $category->id = 3;
        $category->name = 'New';
        $category->save();
    }
}
