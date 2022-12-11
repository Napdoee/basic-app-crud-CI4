<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for($i = 0; $i < 50; $i++){
            $data = [
                'name' => $faker->name(),
                'address' => $faker->streetAddress(),
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        
            $this->db->table('person')->insert($data);
        }

        // $data = [
        //     'name' => 'John Doe',
        //     'address' => '95th El Corona',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now(),
        // ];

        // $this->db->table('person')->insert($data);
    }
}