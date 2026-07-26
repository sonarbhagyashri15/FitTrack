<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('progress', function (Blueprint $table) {

            $table->decimal('height', 5, 2)->after('weight');

        });
    }

    public function down(): void
    {
        Schema::table('progress', function (Blueprint $table) {

            $table->dropColumn('height');

        });
    }
};