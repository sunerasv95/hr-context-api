<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChallengeFourTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_challenge_four()
    {
        $desiredArr = ["Company A" => ["insurance.txt", "letter.docx"], "Company B" => ["Contract.docx"]];

        $response = $this->get('/api/challengeFour');

        $response->assertJson($desiredArr);
    }
}
