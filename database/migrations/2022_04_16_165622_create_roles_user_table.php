<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roles_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
       // Schema::table('roles_user', function (Blueprint $table){
        //    $table->dropForeign('roles_user_roles_id_foreign');
        //    $table->dropForeign('roles_user_user_id_foreign');
        //});
        Schema::dropIfExists('roles_user');
    }
};
