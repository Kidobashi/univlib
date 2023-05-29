<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LibrarianCat;
use App\Models\User;

class LibrarianCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $categories = LibrarianCat::all();

        foreach ($users as $user) {
            $category = $categories->random();
            $user->librarianUser()->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
