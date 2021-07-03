<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id', 20)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_phone')->nullable();
            $table->bigInteger('user_nid')->nullable();
            $table->longText('user_address')->nullable();
            $table->longText('about_you')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country')->nullable();
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->enum('business_type', ['individual', 'company','trading'])->nullable();
            $table->enum('gender', ['male', 'female','others'])->nullable();
            $table->enum('is_verified', ['active', 'inactive'])->default('inactive');
            $table->enum('user_role', ['admin', 'supervisor','operator','customer'])->default('customer');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('users');
    }
}
