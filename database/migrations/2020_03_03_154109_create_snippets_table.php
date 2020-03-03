<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->mediumText('content');
            $table->string('uid')->unique();
            $table->unsignedBigInteger('author_id');
            $table->dateTime('expired_at')->nullable();
            $table->unsignedSmallInteger('access_mode_id')->nullable();
            $table->timestamps();
            //
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('access_mode_id')->references('id')->on('snippets_access_modes')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snippets');
    }
}
