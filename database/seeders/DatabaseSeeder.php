<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call((ShipsDatabase::class));
        $this->call((ProductsDatabase::class));
        $this->call((SupplyUnitsDatabase::class));
        $this->call((UsersDatabase::class));
        $this->call((ImportInvoicesDatabase::class));
        $this->call((ImportInvoiceDetailsDatabase::class));
        $this->call((VouchersDatabase::class));
        $this->call((SalesInvoicesDatabase::class));
        $this->call((SalesInvoiceDetailsDatabase::class));
        $this->call((NewsDatabase::class));
        $this->call((CommentsDatabase::class));
    }
}
