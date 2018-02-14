<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Log::class, 20)->create()->each(
            function($log) {
                factory(App\LogService::class)->create(['log_id' => $log->id]);
            }
        );

        factory(App\Customer::class, 20)->create();

        factory(App\Good::class, 20)->create();
        
        factory(App\Inventory::class, 5)->create()->each(
            function($inventory){
                factory(App\RentPrice::class)->create(['inventory_id' => $inventory->id]);
            }
        );

        factory(App\Category::class, 5)->create();

        factory(App\Organization::class, 5)->create();        
    }
}
