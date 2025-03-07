<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SenatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $senators = [
            [
                'senator_id' => 'senator-1',
                'first_name' => 'Jonah',
                'last_name' => 'Mandli',
                'email' => 'jmandli12@gmail.com'
            ],
            [
                'senator_id' => 'senator-2',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email
            ],
            [
                'senator_id' => 'senator-3',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email
            ],
            [
                'senator_id' => 'senator-4',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email
            ]
        ];

        foreach ($senators as $senator) {
            \App\Models\Senator::create($senator);
        }

        $this->command->info('Senators seeded!');
    }
}
