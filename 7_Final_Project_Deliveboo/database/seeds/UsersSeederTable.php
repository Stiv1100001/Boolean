<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUserOne = new User();
        $newUserOne->image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
        $newUserOne->name_restaurant = "Da Gigi";
        $newUserOne->address='Via delle stelle, 1';
        $newUserOne->vat_number=$faker->vat();
        $newUserOne->email=$faker->email();
        $newUserOne->password = Hash::make("deliveboo");
        $newUserOne->save();
        $newUserOne->types()->sync(([1,6,13]));

        $newUserTwo = new User();
        $newUserTwo-> image_url =  "https://www.ristorantedapaoloolbia.it/wp-content/uploads/ristorante-da-paolo-ingresso-esterno.jpeg";
        $newUserTwo->name_restaurant = "Da Paolo";
        $newUserTwo->address='Viale Marconi,3';
        $newUserTwo->vat_number=$faker->vat();
        $newUserTwo->email=$faker->email();
        $newUserTwo->password = Hash::make("deliveboo");
        $newUserTwo->save();
        $newUserTwo->types()->sync(([1,6,7]));

        $newUserThree = new User();
        $newUserThree-> image_url =  "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/PIZZERIA_1830.jpg/1200px-PIZZERIA_1830.jpg";
        $newUserThree->name_restaurant = "Pizzeria";
        $newUserThree->address='Via Aldo Moro,9';
        $newUserThree->vat_number=$faker->vat();
        $newUserThree->email=$faker->email();
        $newUserThree->password = Hash::make("deliveboo");
        $newUserThree->save();
        $newUserThree->types()->sync(([1,5,7]));

        $newUserFour = new User();
        $newUserFour-> image_url =  "https://img.restaurantguru.com/w550/h367/rc1f-Jin-Feng-exterior.jpg";
        $newUserFour->name_restaurant = "Da Jing Feng";
        $newUserFour->address='Via dei quarti, 125';
        $newUserFour->vat_number=$faker->vat();
        $newUserFour->email=$faker->email();
        $newUserFour->password = Hash::make("deliveboo");
        $newUserFour->save();
        $newUserFour->types()->sync(([2,3]));

        $newUserFive = new User();
        $newUserFive-> image_url =  "https://www.shinto.it/wp-content/uploads/2017/09/shinto0.jpg";
        $newUserFive->name_restaurant = "Shinto";
        $newUserFive->address=$faker->address();
        $newUserFive->vat_number=$faker->vat();
        $newUserFive->email=$faker->email();
        $newUserFive->password = Hash::make("deliveboo");
        $newUserFive->save();
        $newUserFive->types()->sync(([5,8]));

        $newUserSix = new User();
        $newUserSix-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9UnntZ2P2HQ2X012J7fZ4I9LTKJT6IS8GhA&usqp=CAU";
        $newUserSix->name_restaurant = "Taste Good Hamburgeria Italiana";
        $newUserSix->address=$faker->address();
        $newUserSix->vat_number=$faker->vat();
        $newUserSix->email=$faker->email();
        $newUserSix->password = Hash::make("deliveboo");
        $newUserSix->save();
        $newUserSix->types()->sync(([12,11]));

        $newUserSeven = new User();
        $newUserSeven-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjKKXjRYp8CYPqnlXWRJCEYGS4vTJ9iieAyg&usqp=CAU";
        $newUserSeven->name_restaurant = "Romeow Cat Bistrot";
        $newUserSeven->address=$faker->address();
        $newUserSeven->vat_number=$faker->vat();
        $newUserSeven->email=$faker->email();
        $newUserSeven->password = Hash::make("deliveboo");
        $newUserSeven->save();
        $newUserSeven->types()->sync(([5,10]));

        $newUserEight = new User();
        $newUserEight-> image_url =  "https://www.zarla.com/images/zarla-appetithai-1x1-2400x2400-20210607-7rxrrvyjqpyhtxwh4kfx.png?crop=1:1,smart&width=250&dpr=2";
        $newUserEight->name_restaurant = "Appetithai";
        $newUserEight->address=$faker->address();
        $newUserEight->vat_number=$faker->vat();
        $newUserEight->email=$faker->email();
        $newUserEight->password = Hash::make("deliveboo");
        $newUserEight->save();
        $newUserEight->types()->sync(([9,5]));

        $newUsernNine = new User();
        $newUsernNine-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPnoVsZxvBpNdxZoXdjAfVJKhkVSKn-QsFtw&usqp=CAU";
        $newUsernNine->name_restaurant = "Puerto Mexico";
        $newUsernNine->address=$faker->address();
        $newUsernNine->vat_number=$faker->vat();
        $newUsernNine->email=$faker->email();
        $newUsernNine->password = Hash::make("deliveboo");
        $newUsernNine->save();
        $newUsernNine->types()->sync(([9,5]));

        $newUserTen = new User();
        $newUserTen-> image_url =  "https://zurusushi.it/wp-content/uploads/2021/08/5-512x683.jpg";
        $newUserTen->name_restaurant = "Zuru sushi";
        $newUserTen->address=$faker->address();
        $newUserTen->vat_number=$faker->vat();
        $newUserTen->email=$faker->email();
        $newUserTen->password = Hash::make("deliveboo");
        $newUserTen->save();
        $newUserTen->types()->sync(([8,5]));
    }
}
