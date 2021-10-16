<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->string('cpf')->unique();
            $table->string('endereco')->nullable();
            $table->string('email')->unique();
            $table->string('perfil')->default('Publico'); // Tipos: Publico, Juridico, Admin
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Ronaldo',
            'email' => 'ronaldo.mello@tjmt.jus.br',
            'password' => Hash::make('123456'),
            'cpf' => '000.000.000-00',
            'endereco' => 'forum de caceres - MT',
            'perfil' => 'Admin'
        ]);
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
