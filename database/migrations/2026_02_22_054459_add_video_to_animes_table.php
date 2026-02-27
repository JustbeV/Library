<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('animes', function (Blueprint $table) {
        $table->string('video')->nullable()->after('cover_image');
    });
}

public function down()
{
    Schema::table('animes', function (Blueprint $table) {
        $table->dropColumn('video');
    });
}
};
