<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->default(0);//->constrained('catalogs')->cascadeOnDelete();
            $table->string('token', 50)->index();
            $table->string('name');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
