<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('staff_all')->nullable();
            $table->boolean('staff_order')->nullable();
            $table->boolean('staff_vieworder')->nullable();
            $table->boolean('staff_updateorder')->nullable();
            $table->boolean('staff_deleteorder')->nullable();

            $table->boolean('cashier_all')->nullable();
            $table->boolean('cashier_checkbill')->nullable();
            $table->boolean('cashier_viewbill')->nullable();
            $table->boolean('cashier_report')->nullable();
            $table->boolean('cashier_deletereport')->nullable();

            $table->boolean('manage_all')->nullable();
            $table->boolean('manage_viewmenu')->nullable();
            $table->boolean('manage_addmenu')->nullable();
            $table->boolean('manage_updatemenu')->nullable();
            $table->boolean('manage_deletemenu')->nullable();
            $table->boolean('manage_booktable')->nullable();
            $table->boolean('manage_viewbooktable')->nullable();
            $table->boolean('manage_updatebooktable')->nullable();
            $table->boolean('manage_deletebooktable')->nullable();

            $table->boolean('admin_user')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('staff_all');
            $table->dropColumn('staff_order');
            $table->dropColumn('staff_vieworder');
            $table->dropColumn('staff_updateorder');
            $table->dropColumn('staff_deleteorder');

            $table->dropColumn('cashier_all');
            $table->dropColumn('cashier_checkbill');
            $table->dropColumn('cashier_viewbill');
            $table->dropColumn('cashier_report');
            $table->dropColumn('cashier_deletereport');

            $table->dropColumn('manage_all');
            $table->dropColumn('manage_viewmenu');
            $table->dropColumn('manage_addmenu');
            $table->dropColumn('manage_updatemenu');
            $table->dropColumn('manage_deletemenu');
            $table->dropColumn('manage_booktable');
            $table->dropColumn('manage_viewbooktable');
            $table->dropColumn('manage_updatebooktable');
            $table->dropColumn('manage_deletebooktable');

            $table->dropColumn('admin_user');
        });
    }
}
