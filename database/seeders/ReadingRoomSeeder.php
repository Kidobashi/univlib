<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Librarian_Cat;

use Illuminate\Support\Facades\DB;

class ReadingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles::factory()->times(10)->create();
        DB::table('librarian_cat')->insert([
            'category' => 'COE Librarian'
        ]);

        DB::table('librarian_cat')->insert([
            'category' => 'CISC Librarian'
        ]);

        DB::table('librarian_cat')->insert([
            'category' => 'CON Librarian'
        ]);
    }
}
