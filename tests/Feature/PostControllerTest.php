<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase

{

    // use RefreshDatabase;

    /**
    * @test
    */


    public function getIndex()
    {
        $response = $this->get('api/posts');

        $response->assertStatus(200);
    }
        /**
    * @test
    */

    public function postStore()
    {
        $response = $this->post('api/posts',[
            'content' => 'hello',
            'image' => null
        ]);

        $response->assertStatus(201);
    }
}
