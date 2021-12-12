<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Article;


class DeleteArticleByTitleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDeleteAnArticle()
    {
        $article = Article::where('title', 'Thanh Tung Hoang')->first();

        $this->delete(route('articles.destroy', $article))
            ->assertStatus(200, 'Article has been deleted')
            ->assertJson($article);
    }
}
