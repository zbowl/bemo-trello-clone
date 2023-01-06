<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Column;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         User::factory(10)->create();

        User::factory()
            ->has(Column::factory()
                ->has(Card::factory()
                    ->count(5),
                    'cards'
                )
                ->count(2),
                'columns'
            )
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
    }
}
