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
        $i = 1;
        while ($i <= 90000) {
            User::create(
                [
                    'lat' => Address::latitude(),
                    'lon' => Address::longitude()
                ]
            );
            $i++;
        }
    }
}
