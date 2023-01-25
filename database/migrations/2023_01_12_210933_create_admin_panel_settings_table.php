<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_panel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name', 250);
            $table->string('photo', 250);
            $table->boolean('active', 1)->default(1);
            $table->string('generl_alert', 150)->nullable();
            $table->string('address', 150);
            $table->string('phone', 100);
            $table->integer('added_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('company_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_panel_settings');
    }
};
