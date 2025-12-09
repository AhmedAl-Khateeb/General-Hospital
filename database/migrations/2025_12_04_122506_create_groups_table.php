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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description')->nullable();
            $table->decimal('total_before_discount', 8, 2)->comment('الاجمالى قبل الخصم'); // الاجمالى قبل الخصم
            $table->decimal('discount_value', 8, 2)->comment('قيمة الخصم'); // قيمة الخصم
            $table->decimal('total_after_discount', 8, 2)->comment('الاجمالى بعد الخصم'); // الاجمالى بعد الخصم
            $table->string('text_rate')->comment('قيمة الضريبه المضافه'); // قيمة الضريبه المضافه
            $table->decimal('total_with_tax', 8, 2)->comment('الاجمالى بعد الضريبة'); // الاجمالى بعد الضريبة
            $table->boolean('is_active')->default(true)->comment('الحالة'); // الحالة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
