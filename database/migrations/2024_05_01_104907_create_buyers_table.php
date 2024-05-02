<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('city_id')->unsigned()->index();
            $table->string('address_office');
            $table->string('address_mills', 250);
            $table->string('phone_mills');
            $table->string('fax')->nullable();
            $table->string('phone_office');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('sale_tax_no');
            $table->string('national_tax_no');
            $table->string('remarks')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');


            $table->foreign('city_id')
            ->references('id')->on('cities')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
