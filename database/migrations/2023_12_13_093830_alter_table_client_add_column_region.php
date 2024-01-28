<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientAddColumnRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('province')->nullable()->after('country');
            $table->string('district')->nullable()->after('city');
            $table->string('subdistrict')->nullable()->after('district');
            $table->string('office_city')->nullable()->after('office_address');
            $table->string('office_district')->nullable()->after('office_city');
            $table->string('office_subdistrict')->nullable()->after('office_district');
            $table->string('office_province')->nullable()->after('office_subdistrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('province');
            $table->dropColumn('district');
            $table->dropColumn('subdistrict');
            $table->dropColumn('office_city');
            $table->dropColumn('office_district');
            $table->dropColumn('office_subdistrict');
            $table->dropColumn('office_province');
        });
    }
}
