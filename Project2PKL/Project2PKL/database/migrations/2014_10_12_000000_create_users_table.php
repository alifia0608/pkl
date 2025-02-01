<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Kolom email, harus unik
            $table->string('password');        // Kolom password
            $table->timestamps();              // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
