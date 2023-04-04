<?php

namespace Tests\Feature;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
class ArticleControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testIndex()
    {
        $articles = factory(Article::class, 5)->create();
        
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
    }
    public function testStore()
    {
        $category = factory(Category::class)->create();

        $data = [
            'title' => 'Test Article',
            'body' => 'This is a test article',
            'category_id' => $category->id,
        ];

        $response = $this->post('/articles/add', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
    }
}
