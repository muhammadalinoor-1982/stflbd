<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFashionProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fashion_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fashion_id');
            $table->foreign('fashion_id')->references('id')->on('fashions');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('quantity')->nullable();
            $table->string('regular_prise')->nullable();
            $table->string('special_prise')->nullable();
            $table->string('discount_prise')->nullable();
            $table->string('bulk_prise')->nullable();
            $table->string('production_lead_time')->nullable();
            $table->string('delivery_lead_time')->nullable();
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
        Schema::dropIfExists('fashion_products');
    }
}
