<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnVariantValueToProductVariationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->string('variant_code')->nullable()->after('product_id');
            $table->string('variant_name_type_barcode')->nullable()->after('variant_code');
            $table->bigInteger('attribute_id')->after('variant_code')->nullable();
            $table->bigInteger('attribute_value_id')->after('attribute_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn('variant_code');
            $table->dropColumn('variant_name_type_barcode');
            $table->dropColumn('attribute_id');
            $table->dropColumn('attribute_value_id');
        });
    }
}
