<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateOrReplaceDistrictsGroupsViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:CreateOrReplaceDistrictsGroupsView';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or Replace SQL View.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
                LEFT JOIN cities ON districts.city_id =  cities.id
                LEFT JOIN groups ON cities.group_id =  groups.id
        ");
    }
}
