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
        Schema::create('salary_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('employee_id'); // Foreign key to the users table
            $table->decimal('ctc_salary', 10, 2); // CTC and Salary field
            $table->decimal('basic_monthly', 10, 2); // Monthly amount for Basic
            $table->decimal('house_rent_allowance_monthly', 10, 2); // Monthly amount for House Rent Allowance
            $table->decimal('conveyance_allowance_monthly', 10, 2); // Monthly amount for Conveyance Allowance
            $table->decimal('fixed_allowance_monthly', 10, 2); // Monthly amount for Fixed Allowance
            $table->decimal('basic_annual', 10, 2); // Annual amount for Basic
            $table->decimal('house_rent_allowance_annual', 10, 2); // Annual amount for House Rent Allowance
            $table->decimal('conveyance_allowance_annual', 10, 2); // Annual amount for Conveyance Allowance
            $table->decimal('fixed_allowance_annual', 10, 2); // Annual amount for Fixed Allowance
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
        Schema::dropIfExists('salary_details');
    }
};
