<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_attribute_id');
            $table->foreign('variant_attribute_id')
                ->references('id')
                ->on('variant_attributes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->string('variant_attribute_value_code');
            $table->string('variant_attribute_value_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variant_attribute_values');
    }
}
