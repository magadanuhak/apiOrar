<?php


namespace Tests\Utils;


trait Auth
{
    public function login(){
        $response = $this->json('POST', '/api/auth/login', [
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'remember_me' => true
        ]);
        return 'Bearer '.$response->json('access_token');

    }
}