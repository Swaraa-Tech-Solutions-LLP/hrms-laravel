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
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('employee_id'); // Foreign key to the users table
            $table->string('mobile_number')->unique();
            $table->string('present_address'); // Present Address
            $table->string('present_city'); // Present City
            $table->string('present_state')->nullable(); // Present State (optional)
            $table->string('present_country'); // Present Country
            $table->string('present_national_id')->nullable(); // National ID
            $table->string('permanent_address')->nullable(); // Permanent Address
            $table->string('permanent_city')->nullable(); // Permanent City
            $table->string('permanent_state')->nullable(); // Permanent State (optional)
            $table->string('permanent_country')->nullable(); // Permanent Country
            $table->string('permanent_national_id')->nullable();
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint to the users table
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_details');
    }
};
