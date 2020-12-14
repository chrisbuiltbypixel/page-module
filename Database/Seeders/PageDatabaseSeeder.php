<?php

namespace Modules\Page\Database\Seeders;

use Modules\Page\Entities\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Page::factory()->times(50)->create();
    }
}
