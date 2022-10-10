<?php

use App\Model\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                TypesSeederTable::class,
                UsersSeederTable::class,
                DishesSeederTable::class,
            ]
        );
    }
}
