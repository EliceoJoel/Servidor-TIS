<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostulantTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetPostulant(){
        $response = $this->json('GET','/api/postulant/2016');
        $response->status(200);
        $response->assertJsonStructure(['id','names','first_surname','second_surname',
                                        'direction','email','phone','ci','auxiliary']);
    }

}
