<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->id(); // gender id
            $table->string('gender'); // e.g., Male, Female
        });

        // Insert default genders
        DB::table('genders')->insert([
            ['gender' => 'Male'],
            ['gender' => 'Female']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('genders');
    }
};
