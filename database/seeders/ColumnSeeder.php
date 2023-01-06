<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Column;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Column::factory()
            ->count(3)
            ->has(
                Card::factory()
                    ->count(5),
                'cards'
            )
            ->for(User::factory()->create())
            ->create();
    }
}
