<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Column;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::factory()
            ->count(3)
            ->for(Column::factory()
                ->for(User::factory()
                    ->create()
                )
                ->create([
                'title' => 'Created by CardSeeder',
            ]))
            ->create();
    }
}
