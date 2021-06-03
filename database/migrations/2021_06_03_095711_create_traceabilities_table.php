<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraceabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traceabilities', function (Blueprint $table) {
            $table->id();
            $table->string('traceacode');
            $table->string('farm_code');
            $table->string('farm_address');
            $table->string('harvest_date');
            $table->string('tank_code');
            $table->string('packing_date');
            $table->string('lot_code');
            $table->string('approval_number');
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
        Schema::dropIfExists('traceabilities');
    }
}
