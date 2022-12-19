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
        $this->call((ProductTypesDatabase::class));
        $this->call((ProductsDatabase::class));
        // $this->call((ImagesDatabase::class));
        $this->call((ProductStatussDatabase::class));
        $this->call((SupplyUnitsDatabase::class));
        $this->call((PositionTypesDatabase::class));
        $this->call((RegionsDatabase::class));
        $this->call((ProvincesDatabase::class));
        $this->call((UsersDatabase::class));
        $this->call((ImportInvoicesDatabase::class));
        $this->call((ImportInvoiceDetailsDatabase::class));
        $this->call((SalesInvoiceStatussDatabase::class));
        $this->call((SalesInvoicesDatabase::class));
        $this->call((SalesInvoiceDetailsDatabase::class));
    }
}
