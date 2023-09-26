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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->comment('名稱');
            $table->string('subTitle', 40)->comment('副標題')->nullable();
            $table->unsignedTinyInteger('type')->comment('類型');
            $table->string('photoSid')->comment('圖片')->nullable();
            $table->text('description')->comment('商品說明');
            $table->unsignedInteger('price')->comment('售價')->default(0);
            $table->unsignedInteger('finalPrice')->comment('最終售價')->default(0);
            $table->boolean('enabled')->comment('狀態')->default(true);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
