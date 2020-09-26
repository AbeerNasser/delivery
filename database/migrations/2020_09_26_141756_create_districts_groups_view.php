<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateDistrictsGroupsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('districts_groups_view', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::statement("
            CREATE VIEW districts_groups
            AS
            SELECT
                districts.name,
                districts.city_id,
                cities.group_id,
                groups.name AS group_name,
                groups.price,
            FROM
                districts
                JOIN cities ON districts.city_id =  cities.id
                JOIN groups ON cities.group_id =  groups.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts_groups_view');
    }
}
