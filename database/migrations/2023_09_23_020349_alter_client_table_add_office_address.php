<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClientTableAddOfficeAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('postal_code')->nullable();
            $table->string('office_name')->nullable();
            $table->text('office_address')->nullable();
            $table->integer('office_postal_code')->nullable();
            $table->string('office_phone')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('modified_user_id')->nullable();
            $table->unsignedBigInteger('deleted_user_id')->nullable();
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
            $table->dropColumn('postal_code');
            $table->dropColumn('office_name');
            $table->dropColumn('office_address');
            $table->dropColumn('office_postal_code');
            $table->dropColumn('office_phone');
            $table->dropColumn('created_user_id');
            $table->dropColumn('modified_user_id');
            $table->dropColumn('deleted_user_id');
        });
    }
}
