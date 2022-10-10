<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationDishesTableToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("dish_id"); 
                $table->foreign("dish_id")
                ->references("id")
                ->on("dishes")->onDelete("cascade");

            $table->unsignedBigInteger("order_id");
                $table->foreign("order_id")
                ->references("id")
                ->on("orders")->onDelete("cascade"); 

            $table->tinyInteger("quantity"); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_dishes_table_to_orders');
    }
}
