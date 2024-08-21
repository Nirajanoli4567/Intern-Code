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
        //
        Schema::create('Blogs', function (Blueprint $table)
        {
            $table->id();
            $table->string('title')->unique();
            $table->string('category');
            $table->string('description');
            $table->enum('status', ['approved', 'notapproved'])->default('notapproved');
            $table->string('photo')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
