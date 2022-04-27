<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_seances', function (Blueprint $table) {
            $table->bigInteger('worker_id')->unsigned();
            $table->bigInteger('seance_id')->unsigned();

            $table->primary(['worker_id','seance_id']);

            $table->foreign('worker_id')
                ->references('id')
                ->on('workers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('seance_id')
                ->references('id')
                ->on('seances')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('worker_seances');
    }
}
