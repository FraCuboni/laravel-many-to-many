<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {

            // COLONNA PER POST FK
            $table->unsignedBigInteger('post_id');  //creo la colonna in relazione con post

            // assegno FK
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete();    //se il tag viene eliminato elimina la connessione con l'elemento


            // COLONNA PER TAG FK
            $table->unsignedBigInteger('tag_id');  //creo la colonna in relazione con tag

            // assegno FK
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnDelete();    //se il tag viene eliminato elimina la connessione con l'elemento
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
