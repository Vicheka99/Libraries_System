<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('gender_name'); // Male / Female
            $table->timestamps();
        });

        // Insert default genders
        DB::table('genders')->insert([
            ['gender_name' => 'Male', 'created_at' => now(), 'updated_at' => now()],
            ['gender_name' => 'Female', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('genders');
    }
};
