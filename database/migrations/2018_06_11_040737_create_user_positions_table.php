<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->string('index')->nullable();
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

//        Schema::table('user_positions', function (Blueprint $table) {
//            $table->dropColumn('position_id');
//            $table->dropColumn('menu_roles');
//        });
        Schema::dropIfExists('user_positions');
    }
}
