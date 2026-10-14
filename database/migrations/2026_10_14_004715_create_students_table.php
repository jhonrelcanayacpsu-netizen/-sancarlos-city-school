<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('students', function (Blueprint $t){
   $t->id(); $t->string('fullname'); $t->string('grade_level'); $t->string('strand')->nullable(); $t->string('contact'); $t->timestamps();
  });
 }
 public function down(): void { Schema::dropIfExists('students'); }
};
