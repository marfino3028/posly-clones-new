<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_variants', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->nullable()->index('product_id_variant');
			$table->integer('variant_attribute_id')->nullable()->index('variant_attributes');
			$table->integer('variant_attribute_value_id')->nullable()->index('variant_attribute_value');
			$table->string('variant_code', 191);
			$table->string('code', 191);
			$table->string('variant_name_type_barcode', 191);
			$table->string('name_product_variant', 192)->nullable();
			$table->float('additional_cost', 10, 0)->nullable()->default(0);
			$table->float('additional_price', 10, 0)->nullable()->default(0);
			$table->timestamps(6);
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
		Schema::drop('product_variants');
	}

}
