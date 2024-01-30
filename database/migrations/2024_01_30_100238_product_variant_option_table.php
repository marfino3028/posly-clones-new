<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductVariantOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_options', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->unsignedBigInteger('product_variant_id'); // Kolom product_variant_id sebagai foreign key
            $table->unsignedBigInteger('attribute_id'); // Kolom attribute_id sebagai foreign key
            $table->float('additional_cost', 10, 2)->nullable(); // Kolom additional_cost dengan tipe data float dan dapat bernilai null
            $table->float('additional_price', 10, 2)->nullable(); // Kolom additional_price dengan tipe data float dan dapat bernilai null
            $table->timestamps(); // Kolom created_at dan updated_at otomatis ditambahkan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variant_options');
    }
}
