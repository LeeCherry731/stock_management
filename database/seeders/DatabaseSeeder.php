<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
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
        // $this->call(UsersSeeder::class);

        Product::create([
            'category_id' => 1,
            'name' => 'pen',
            'price' => 20,
            'limit' => 10,
            'quantity' => 15,
        ]);
        Product::create([
            'category_id' => 1,
            'name' => 'nut',
            'price' => 10,
            'limit' => 15,
            'quantity' => 50,
        ]);

/////////////////////////////////////////
        Category::create([
            'name' => 'office',
            'slug' => 'office',
        ]);
        Category::create([
            'name' => 'production',
            'slug' => 'production',
        ]);
        Category::create([
            'name' => 'maintenance',
            'slug' => 'MT',
        ]);
        Category::create([
            'name' => 'Quality Control',
            'slug' => 'QC',
        ]);
/////////////////////////////////////////

        Supplier::create([
            'name' => 'Sup1',
            'email' => 'Sup1@email.com',
        ]);
        Supplier::create([
            'name' => 'Sup2',
            'email' => 'Sup2@email.com',
        ]);
        Supplier::create([
            'name' => 'Sup3',
            'email' => 'Sup3@email.com',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$FEzWHPoxxtw.3UdSjRM.fesYUjVTvCemdIcFYvA0oxOhR/RCm27r2',

        ]);

        $sup1 = Supplier::first();
        $pro1 = Product::first();
        $pro1 = Product::find(2);

        $sup2 = Supplier::find(2);


        $sup1->products()->attach($pro1);
        $sup2->products()->attach($pro1);

    }
}
// sail php artisan migrate:fresh --seed

// php artisan migrate:fresh --seed  = delete all databases and remigrate seed new seeders
