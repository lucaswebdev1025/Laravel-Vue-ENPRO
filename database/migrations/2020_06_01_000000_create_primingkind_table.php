<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimingkindTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'primingkind';

    /**
     * Run the migrations.
     * @table substation_has_connector
     *
     * @return void
     */
    public function up()
    {
        // ts это новая таблица
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();

            // поля Laravel
            $table->softDeletes();
            $table->timestamps();
        });

        // комментарий к таблице
        try {
            DB::statement("ALTER TABLE `" . $this->tableName . "` comment 'Грунт заземлений'");
        } catch (
            Exception $e) {
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // на случай отката - удалить таблицу
        Schema::dropIfExists($this->tableName);
    }
}
