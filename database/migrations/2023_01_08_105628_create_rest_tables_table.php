<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_tables', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->double('cost')->default(0);
            $table->boolean('has_paid')->default(false);
            $table->string('qr_code')->nullable();
            $table->string('qr_path')->nullable();
            $table->timestamps('date');
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
        Schema::dropIfExists('rest_tables');
    }
}
