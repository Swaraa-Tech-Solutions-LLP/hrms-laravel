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
        Schema::create('identity_informations', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('employee_id'); // Foreign key to the users table
            $table->string('sss_no')->nullable(); // SSS Number
            $table->string('philhealth_no')->nullable(); // PhilHealth Number
            $table->string('hdmf')->nullable(); // HDMF (Pag-IBIG) Number
            $table->string('tax_identification_no')->nullable(); // Tax Identification Number
            $table->string('bank_name')->nullable(); // Bank Name
            $table->string('bank_account_number')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('identity_informations');
    }
};
