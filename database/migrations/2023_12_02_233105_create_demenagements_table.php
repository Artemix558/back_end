<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemenagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demenagements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            // $table->unsignedBigInteger('id_demenageur');
            // $table->foreign('id_demenageur')->references('id')->on('users')->onDelete('cascade');
            $table->string('type'); // regional, national,international
            $table->string('etat')->default('en traitement');
            $table->string('situation_local_depart')->default('au rez-de-chaussee'); // rez de chausse, a l'etage,
            $table->string('liaison_local_depart')->default('au rez-de-chaussee'); // rez de chausse, a l'etage,
            $table->string('liaison_local_arrivee')->default('au rez-de-chaussee'); // rez de chausse, a l'etage,
            $table->string('situation_local_arrivee')->default('au rez-de-chaussee'); // rez de chausse, a l'etage,
            $table->string('pays_depart')->nullable();
            $table->string('ville_depart');
            $table->string('quartier_depart');
            $table->string('distance_route_depart');
            $table->string('pays_arrivee')->nullable();
            $table->string('ville_arrivee');
            $table->string('quartier_arrivee');
            $table->string('distance_route_arrivee');
            $table->string('date_demenagement');
            $table->string('heure_demenagement');
            $table->json('objects');
            $table->json('object_fragiles');
            $table->json('autres');
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
        Schema::dropIfExists('demenagements');
    }
}
