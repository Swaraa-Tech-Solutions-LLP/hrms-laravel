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
        Schema::create('pay_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('salary_components', function (Blueprint $table) {
            $table->id();
            $table->decimal('annual_ctc', 15, 2);
            $table->foreignId('pay_type_id')->constrained('pay_types')->onDelete('cascade');
            $table->decimal('regular_rate', 15, 2);
            $table->decimal('supervisor_incentive', 15, 2)->nullable();
            $table->decimal('trans_allowance', 15, 2)->nullable();
            $table->decimal('COLA', 15, 2)->nullable();
            $table->decimal('daily_meal_allowance', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_components');
        Schema::dropIfExists('pay_types');
    }
};
