<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("type_user", function (Blueprint $table){
            $table->unsignedBigInteger("user_id"); 
            $table->foreign("user_id")
            ->references("id")
            ->on("users")->onDelete("cascade");

            $table->unsignedBigInteger("type_id"); 
            $table->foreign("type_id")
            ->references("id")
            ->on("types")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("type_user");
    }
}
