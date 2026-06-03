<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // 課題2のバグ用: 外部キー制約なし（user_id=0 を入れるため）
            $table->unsignedBigInteger('user_id')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('posts'); }
};
