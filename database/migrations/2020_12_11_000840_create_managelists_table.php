<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managelists', function (Blueprint $table) {
            $table->bigIncrements('id');
            // カラムを作成していく
            $table->integer('n_filetype');
            $table->string('vc_filename',128);
            $table->string('vc_filepath',256);
            $table->timestamps();
            $table->boolean('b_enable')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managelists');
    }
}
