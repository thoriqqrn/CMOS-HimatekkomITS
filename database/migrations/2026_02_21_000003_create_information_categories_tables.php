<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('information_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('information_board_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('information_board_id')->constrained('information_boards')->cascadeOnDelete();
            $table->foreignId('information_category_id')->constrained('information_categories')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['information_board_id', 'information_category_id'], 'info_board_category_unique');
        });

        DB::table('information_categories')->insert([
            ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kolaborasi', 'slug' => 'kolaborasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dokumentasi', 'slug' => 'dokumentasi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('information_board_category');
        Schema::dropIfExists('information_categories');
    }
};
