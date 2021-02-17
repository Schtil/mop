<?php namespace Schtil\Onevago\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTableTour extends Migration
{
    public function up()
    {
        Schema::create('schtil_onevago_tour', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('creator_id');
            $table->string('name');
            $table->string('address');
            $table->integer('cost');
            $table->mediumText('description');
            $table->bigInteger('type_id');
            $table->string('location');
            $table->string('contact');
            $table->date('start_date');
            $table->date('end_date');
            $table->json("details")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schtil_onevago_tour');
    }
}
