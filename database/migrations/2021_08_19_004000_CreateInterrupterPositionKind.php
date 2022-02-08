<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterrupterPositionKind extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interrupter_position_kind', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('value')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('ru_value')->nullable(true);
            $table->string('enpro_code')->nullable(true);


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (env('DB_CONNECTION') != 'sqlite') {
        Schema::dropIfExists('interrupter_position_kind');

        }
    }

}
