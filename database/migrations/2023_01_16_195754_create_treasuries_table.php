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
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->boolean('is_master')->default(0)->comment('هل هي خذنة رئيسية 0 or 1');
            $table->bigInteger('last_receipt_number_exchange')->comment('رقم أخر إيصال للصرف');
            $table->bigInteger('last_receipt_number_collection')->comment('رقم أخر إيصال للتحصيل');
            $table->integer('added_by');
            $table->boolean('active')->default(1);
            $table->integer('updated_by')->nullable();
            $table->integer('company_code');
            $table->date('date')->comment('سيستخدم للبحث');
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
        Schema::dropIfExists('treasuries');
    }
};
