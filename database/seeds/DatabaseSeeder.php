<?php

use App\Models\GovtDocumentDet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//         $this->call(ThamaticAreas::class);
//         $this->call(Menus::class);
        // $this->call(DocumentTypes::class);
        // $this->call(DocumentSubTypes::class);
        $this->call(GovtDocumentTypes::class);
    }
}
