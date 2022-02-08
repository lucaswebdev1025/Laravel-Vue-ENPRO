<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubstationHasAssetaccountingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'substation_has_assetaccounting';

    /**
     * Run the migrations.
     * @table substation_has_assetaccounting
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('substation_id');
            $table->unsignedBigInteger('assetaccounting_id');

            // поля Laravel
            $table->softDeletes();
            $table->timestamps();

            // связи
            $table->foreign('substation_id')
                ->references('id')->on('substation')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('assetaccounting_id')
                ->references('id')->on('assetaccounting')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        // комментарий к таблице
        try {
            DB::statement("ALTER TABLE `" . $this->tableName . "` comment ''");
        } catch (Exception $e) {
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
