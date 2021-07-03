<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('tag');
            $table->longText('heading')->nullable();
            $table->longText('description')->nullable();
            $table->longText('link')->nullable();
            $table->string('image');
            $table->enum('event', ['special', 'social','cultural','occasional','festival'])->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('creator')->nullable();
            $table->string('updater')->nullable();
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
        Schema::dropIfExists('home_carousels');
    }
}
