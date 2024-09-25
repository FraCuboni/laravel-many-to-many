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
        Schema::table('posts', function (Blueprint $table) {
            // creo la colonna per la FK (foreign key) e la posiziono dopo la colonna id
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            // creo la FK sulla colonna creata
            $table->foreign('type_id')  //methodo foreign() crea FK e specifico colonna
                ->references('id')  //in relazione all'id
                ->on('types') //nella tabella types
                ->onDelete('set null');  //quando elimino una types non si cancella il post in relazione
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //elimino la FK 
            // $table->dropForeign('posts_type_id_foreign');        ->> sintassi interendo nome FK table_column_foreign
            $table->dropForeign(['type_id']); //                    ->> sintassi inserendo nome colonna FK

            // elimino la colonna
            $table->dropColumn('type_id');
        });
    }
};
