<?php

namespace Tests\Unit;

use Tests\TestCase;

class ArticleTitleLengthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLengthOfArticleTitle()
    {
        $data = [
            'title' => $this->faker->sentence($nbWords = 201),
            'content' => $this->faker->paragraph
        ];

        if (strlen($data['title'] > 200)) {
            $this->post(route('articles.store'), $data)
                ->assertStatus(422)
                ->assertJson($data);
        } else {
            $this->post(route('articles.store'), $data)
                ->assertStatus(201)
                ->assertJson($data);
        }
    }
}
