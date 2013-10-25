<?php

class UsersSeeder extends DatabaseSeeder {

    public function run(){

        $users = [
            [
                "username" => "test",
                "password" => Hash::make("testas")
            ]
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }

}