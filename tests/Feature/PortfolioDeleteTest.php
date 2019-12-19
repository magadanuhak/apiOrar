<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PortfolioDeleteTest extends TestCase
{
    public $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMzc4YjRkYjZkYTg2MzVjYjNlZTQwNTNlMzIxNTBlNjc4NGQ3NTg0ODdjN2E2YjFhMWRmNzJhZDU2OTY5ZGYwNzgxYTE5NzMxZWU4NDE1ZjAiLCJpYXQiOjE1NzQ2NzA2MzQsIm5iZiI6MTU3NDY3MDYzNCwiZXhwIjoxNjA2MjkzMDM0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.GyPK9RZNb2Ee7DUHaxnGiekRD5tMmEXUmy77IPIqu8zbviMi--vf6arYeAg8ZBTUCbBCWIxNxu2cpG2NyxshcsTSwjw1UuyI1Nuzf4z2xAlTojqTLQczOZAlLvoHISEb3y29s0gWd-ymvVaEKilNNhzHurU4LhKZ7Wfu3ZumjAvzd-rixGbW2YOxitduS650vAYzoq7dAUQ7MdmXsyME4DryirmDX3JphdOO8urhA6gQ9KJn_2H3anZVSL4YOsFKZAfVsyRTCZHD-RA5zlzecWULvUPJADdcWO9kc02uxOlJfQG5Nu_W9a6mPh8sc43rSeix1eVbzv_hxSVmJOJdvJ6rdPF_IegurkF7yDP6piACdd7FGkJJhDo_KuST5pHqzywqIZbl5rWOvW91GDxRIM-wBIRvvbMeQquRotR2heu_Fos1nF-sxiiTNmjK9XuKafy8LzBWl6YIiONOnZpm6fLPoA3D6b_-tXkY_UdEygfiACFKcj959TudeutJAF1xOPu1FNiZ-T5BnTLF3Piy7qfltalvPCtivHEXTLtBLGuPPrI3d5c6bfAz6HvA-0Ib69-8160jq6mmT77iHqAkKClGoslvR7_JE_-c2guhkxE15bM5PauNXk4-BAhRaAlD12KRkAIBKU-d3R4bbIWLw637QuhqWgWPCOgDQhWXyCU';

    public function testDelete(){
        $response = $this->withHeaders([
            'Authorization' => $this->token])
            ->json('DELETE', '/api/portfolios/13'
        );
        $response->assertJson([
            'deleted' => true
        ]);
    }
}
