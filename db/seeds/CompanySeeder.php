<?php


use Phinx\Seed\AbstractSeed;

class CompanySeeder extends AbstractSeed
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
                "name" => "Meal",
                "address" => 'meal@meal.com',
                "businessType" => '/',
                "country" => "Srb",
                "CEO" => "no picture"
            ],
            [
                "name" => "Jeans",
                "address" => 'jeans@jeans.com',
                "businessType" => '/',
                "country" => "Mkd",
                "CEO" => "no picture"
            ],
            [
                "name" => "Hat",
                "address" => 'hat@hat.com',
                "businessType" => '/',
                "country" => "USA",
                "CEO" => "no picture"
            ],
            [
                "name" => "Shirt",
                "address" => 'shirt@shirt.com',
                "businessType" => '/',
                "country" => "BiH",
                "CEO" => "no picture"
            ]
        ];

        $users = $this->table('companies');
        $users->insert($data)
              ->save();
    }
}
