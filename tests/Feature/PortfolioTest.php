<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Utils\Auth;

class PortfolioTest extends TestCase
{
    use Auth;

    public $token;

    public function setUp() : void
    {
        parent::setUp();
        $this->token = $this->login();
    }


    public function testGetAll()
    {
        $response = $this->json('GET', '/api/portfolios');
        $response
            ->assertStatus(200)
            ->assertOk();
    }

    public function testGetOne()
    {
        $response = $this->json('GET', '/api/portfolios/8');
        $response
            ->assertStatus(200)
            ->assertJson([
               'data' =>[ 'id' => 8],
            ]);
    }


    public function testInsert(){
        $response = $this->withHeaders([
            'Authorization' => $this->token])
            ->json('POST', '/api/portfolios',
                [
                    'title'=> 'testAssert',
                    'description' => 'testDescription',
                    'image' => "testImg"]
            );
        $response->assertJson([
            'created' => true
        ]);
    }

    public function testUpdate(){
        $response = $this->withHeaders([
            'Authorization' => $this->token])
            ->json('PATCH', '/api/portfolios/8',
                [
                    'title'=> 'testAssert Updated',
                    'description' => 'testDescription',
                    'image' => "testImg"]
            );
        $response->assertJson([
            'updated' => true
        ]);
    }


}
