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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('fname')->nullable()->after('name');
            $table->string('lname')->nullable()->after('fname');
            $table->string('mobile')->after('email');
            $table->string('otp')->nullable()->after('password');
            $table->string('image')->nullable()->after('otp');
            $table->string('gender', 30)->nullable()->after('image');
            $table->string('social_id')->nullable()->after('gender');
            $table->boolean('is_verified')->default(0)->after('social_id')->comment('1: verified, 0: not verified');
            $table->boolean('status')->default(1)->after('is_verified')->comment('1: active, 0: inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn([
                'fname', 'lname', 'mobile', 'otp', 'image',
                'gender', 'social_id', 'is_verified', 'status'
            ]);
        });
    }
};
