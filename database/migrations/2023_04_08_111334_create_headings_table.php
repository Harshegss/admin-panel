<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('headings', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->string('link');
            $table->string('page');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('headings');
    }
};
