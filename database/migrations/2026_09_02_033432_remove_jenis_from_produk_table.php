<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('produk', 'jenis')) {
            Schema::table('produk', function (Blueprint $table) {
                $table->dropColumn('jenis');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('produk', 'jenis')) {
            Schema::table('produk', function (Blueprint $table) {
                $table->string('jenis')->nullable();
            });
        }
    }
};