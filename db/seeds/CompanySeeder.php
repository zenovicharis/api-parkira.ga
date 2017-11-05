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
                "CEO" => 1
            ],
            [
                "name" => "Jeans",
                "address" => 'jeans@jeans.com',
                "businessType" => '/',
                "country" => "Mkd",
                "CEO" => 2
            ],
            [
                "name" => "Hat",
                "address" => 'hat@hat.com',
                "businessType" => '/',
                "country" => "USA",
                "CEO" => 3
            ],
            [
                "name" => "Shirt",
                "address" => 'shirt@shirt.com',
                "businessType" => '/',
                "country" => "BiH",
                "CEO" => 4
            ]
        ];

        $users = $this->table('companies');
        $users->insert($data)
              ->save();
    }
}
