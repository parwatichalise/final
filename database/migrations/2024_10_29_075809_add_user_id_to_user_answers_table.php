<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('user_answers', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->after('id');
    });
}

public function down()
{
    Schema::table('user_answers', function (Blueprint $table) {
        $table->dropColumn('user_id');
    });
}

};