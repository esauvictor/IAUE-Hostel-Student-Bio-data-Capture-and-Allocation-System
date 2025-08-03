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
        Schema::create('hostels', function (Blueprint $table) {
            $table->id()->primary(); // Primary key and unique
            $table->string('photo', 300);
            $table->string('matriculation_number'); 
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('sex');
            $table->string('marital_status');
            $table->year('year_of_entry');
            $table->integer('level');
            $table->string('department');
            $table->string('faculty');
            $table->string('campus');
            $table->string('state_of_origin');
            $table->string('local_government_area');
            $table->string('residential_address');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('club_membership')->nullable(); // Allows null values
            $table->string('hostel_choice'); // Does not allow null values
            $table->string('acknowledgement_of_consent'); // Assumes unchecked by default
            $table->string('status'); // Default is 'pending'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostels');
    }
};
