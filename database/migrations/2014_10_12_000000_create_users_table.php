<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->string('password');
            $table->string('email');
            $table->string('status_sociale')->default('alleinstehend');
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->string('No_rue')->nullable();
            $table->string('numero')->nullable();
            $table->string('avatar')->default('3906412.png');
            $table->string('type')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
