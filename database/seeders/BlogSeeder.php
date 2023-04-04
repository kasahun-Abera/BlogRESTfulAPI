<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Prepare a seeder file to create 5 categories, 30 Articles and 10 tags
        // Create categories
        factory(Category::class, 5)->create();

        // Create tags
        factory(Tag::class, 10)->create();

        // Create articles
        factory(Article::class, 30)->create()->each(function ($article) {
            // Attach tags
            $article->tags()->attach(Tag::inRandomOrder()->limit(3)->pluck('id'));

            // Upload images
            $images = factory(Image::class, rand(1, 5))->create();
            $article->images()->saveMany($images);
        });
    }
}
