<?php

use App\Model\Type;
use Illuminate\Database\Seeder;

class TypesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
                "Italiano",
                "Cinese",
                "Sushi",
                "Messicano",
                "Ristorante",
                "Agriturismo",
                "Pizzeria",
                "Giapponese",
                "Tailandese",
                "Vegano",
                "Steakhouse",
                "Hamburgeria",
                "Pub"
            ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name_type = $type;
            $newType-> save();
        }
    }
}
