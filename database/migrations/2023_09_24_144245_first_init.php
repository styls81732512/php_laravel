<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 建立 商品product
        // Schema::create('products', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name', 40)->comment('名稱');
        //     $table->string('subTitle', 40)->comment('副標題')->nullable();
        //     $table->unsignedTinyInteger('type')->comment('類型');
        //     $table->string('photoSid')->comment('圖片')->nullable();
        //     $table->text('description')->comment('商品說明');
        //     $table->unsignedInteger('price')->comment('售價')->default(0);
        //     $table->unsignedInteger('finalPrice')->comment('最終售價')->default(0);
        //     $table->boolean('enabled')->comment('狀態')->default(true);

        //     $table->timestamp('created_at')->useCurrent();
        //     $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        //     $table->softDeletes();
        // });

        // 建立 用戶user
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('用戶編號')->unique('uniq_uid')->index('idx_uid');
            $table->string('name')->comment('名稱')->nullable();
            $table->string('email')->comment('信箱')->unique('uniq_email')->nullable();
            $table->string('password')->comment('密碼')->nullable();
            $table->string('phoneNumber')->comment('電話號碼')->nullable();
            $table->string('avatar')->comment('頭像')->nullable();
            $table->integer('points')->comment('金幣餘額');
            $table->integer('broughtTimes')->comment('購買次數');
            $table->text('token')->comment('Token')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
    }
};
