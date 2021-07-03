<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgroProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agro_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agro_id');
            $table->foreign('agro_id')->references('id')->on('agros');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('quantity')->nullable();
            $table->string('regular_prise')->nullable();
            $table->string('special_prise')->nullable();
            $table->string('discount_prise')->nullable();
            $table->string('bulk_prise')->nullable();
            $table->string('cultivation_time')->nullable();
            $table->string('harvesting_time')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('creator')->nullable();
            $table->string('updater')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('agro_products');
    }
}
