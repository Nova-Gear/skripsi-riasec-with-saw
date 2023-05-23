<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bobot_riasec', function (Blueprint $table) {
            $table->id();
            $table->string('Tipe');
            $table->float('A1');
            $table->float('A2');
            $table->float('A3');
            $table->float('A4');
            $table->float('A5');
            $table->float('A6');
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
        Schema::dropIfExists('bobot_riasec');
    }
};
