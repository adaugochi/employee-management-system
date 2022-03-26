<?php

use App\Helpers\MigrationConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(MigrationConstants::TABLE_EMPLOYEES, function (Blueprint $table) {
            $table->decimal('wallet', 19, 2)->default(0)->after('id');
            $table->boolean('is_profile_complete')->default(0)->after('profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(MigrationConstants::TABLE_EMPLOYEES, function (Blueprint $table) {
            $table->dropColumn('wallet');
            $table->dropColumn('is_profile_complete');
        });
    }
}
