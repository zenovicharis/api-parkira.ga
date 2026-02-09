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
                "name" => "Parking kod Vrbaka",
                "address" => 'vrbaka@vrbaka.com',
                "capacity" => 350,
                "places_taken" => 0,
                "cost_per_hour" => 3.5,
                "user_id" => 1,
                "country" => "Srb"
            ],
            [
                "name" => "Parking iz lucne",
                "address" => 'meal@meal.com',
                "capacity" => 350,
                "places_taken" => 0,
                "cost_per_hour" => 3.5,
                "user_id" => 2,
                "country" => "Srb"
            ],
            [
                "name" => "Parking kod Dzena",
                "address" => 'meal@meal.com',
                "capacity" => 350,
                "places_taken" => 0,
                "cost_per_hour" => 3.5,
                "user_id" => 3,
                "country" => "Srb"
            ],
            [
                "name" => "Drzavni Parking",
                "address" => 'meal@meal.com',
                "capacity" => 350,
                "places_taken" => 0,
                "cost_per_hour" => 3.5,
                "user_id" => 4,
                "country" => "Srb"
            ],
            [
                "name" => "Meal",
                "address" => 'meal@meal.com',
                "capacity" => 350,
                "places_taken" => 0,
                "cost_per_hour" => 3.5,
                "user_id" => 5,
                "country" => "Srb"
            ]
        ];

        $users = $this->table('companies');
        $users->insert($data)
              ->save();
    }
}
