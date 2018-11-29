<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->string('matricule');
            $table->primary('matricule');
            $table->text('marque');
            $table->text('modele');
            $table->text('photo')->nullable();
            $table->text('carburant');
            $table->text('couleur');
            $table->date('vignette');
            $table->date('assurance');
            $table->integer('prix');
            $table->date('dateDajout')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('statut')->nullable();
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
        Schema::dropIfExists('voitures');
    }
}
