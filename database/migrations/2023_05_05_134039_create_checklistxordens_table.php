<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateChecklistxordensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklistxordenes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idorden')->index();
            $table->bigInteger('idchecklist')->index();
            $table->bigInteger('idgrupo');
            $table->bigInteger('iditems');
            $table->decimal('orden',1,0);
            $table->decimal('inspeccion',1,0);
            $table->decimal('limpieza',1,0);
            $table->decimal('cambio',1,0);
            $table->string('observaciones',250);
            $table->decimal('estado',1,0);
            $table->string('usuario_created',20);
            $table->string('usuario_updated',20);
            $table->index(['idorden','idchecklist','idgrupo','iditems']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklistxordenes');
    }
}
