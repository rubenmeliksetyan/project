<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('property_id')->unsigned()->nullable();
            $table->decimal('monthly_rent')->nullable();
            $table->date('start_date');
            $table->date('end_date');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties');
            $table->bigInteger('tenant_id')->unsigned()->nullable();
            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants');
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
        Schema::dropIfExists('tenancies');
    }
}
