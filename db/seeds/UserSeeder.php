<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                "first_name" => "Haris",
                "last_name" => 'Zenovic',
                "email" => 'zenovicharis@live.com',
                "password" => password_hash("asd", PASSWORD_DEFAULT),
                "link" => "me.org",
                "picture" => "no picture"
            ],
            [
                "first_name" => "Miomir",
                "last_name" => 'Plojovic',
                "password" => password_hash("asd", PASSWORD_DEFAULT),
                "email" => 'plojovicmiomir@live.com',
                "link" => "me.org",
                "picture" => "no picture"
            ],
            [
                "first_name" => "Rasim",
                "last_name" => 'Ljajic',
                "password" => password_hash("asd", PASSWORD_DEFAULT),
                "email" => 'ljajicrasim@live.com',
                "link" => "me.org",
                "picture" => "no picture"
            ],
            [
                "first_name" => "Predrag",
                "last_name" => 'Zenovic',
                "password" => password_hash("asd", PASSWORD_DEFAULT),
                "email" => 'zenovicpredrag@live.com',
                "link" => "me.org",
                "picture" => "no picture"
            ],
            [
                "first_name" => "Sulejman",
                "last_name" => 'Karisik',
                "password" => password_hash("asd", PASSWORD_DEFAULT),
                "email" => 'karisiksulejman@live.com',
                "link" => "me.org",
                "picture" => "no picture"
            ]
        ];

        $users = $this->table('users');
        $users->insert($data)
              ->save();
    }
}
