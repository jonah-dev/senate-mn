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
        $senators = [
            [
                'senator_id' => 'senator-1',
                'first_name' => 'Jonah',
                'last_name' => 'Mandli',
                'email' => 'jmandli12@gmail.com'
            ],
        ];

        foreach ($senators as $senator) {
            \App\Models\Senator::create($senator);
        }

        $this->command->info('Senators seeded!');
    }
}
