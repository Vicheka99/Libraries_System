<?php

use App\Models\Borrower;
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
        Schema::create(Borrower::TABLE_NAME, function (Blueprint $table) {
            $table->id(Borrower::ID); // Primary Key
            $table->string(Borrower::FIRST_NAME);
            $table->string(Borrower::LAST_NAME) ;
            $table->date(Borrower::DOB)->nullable(); // Optional
            $table->unsignedBigInteger(Borrower::GENDER); // FK to genders table gender_id
            $table->string(Borrower::EMAIL)->unique();
            $table->string(Borrower::PHONE_NUMBER);
            $table->string(Borrower::SCHOOL_NAME);
            $table->timestamps();

            // Foreign Key
            // $table->foreign(Borrower::GENDER)->references('id')->on('genders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};
