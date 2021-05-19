<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\ru_RU\Address;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 90000) as $index) {
            User::create(
                [
                    'lat' => Address::latitude(),
                    'lon' => Address::longitude()
                ]
            );
        }
    }
}
