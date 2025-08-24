<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('usertype')->nullable()->change();
        }); // Add usertype column with a default value
        
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('usertype');
        });
    }
};
