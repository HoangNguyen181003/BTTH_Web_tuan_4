<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50), // Giả sử có 50 bản ghi trong bảng `computers`
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->text(200),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
