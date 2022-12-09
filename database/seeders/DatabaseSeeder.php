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
        $this->call((ProductTypeDatabase::class));
        $this->call((ProductDatabase::class));
        // $this->call((ImagesDatabase::class));
        $this->call((ProductStatusDatabase::class));
        $this->call((SupplyUnitDatabase::class));
        $this->call((PositionTypeDatabase::class));
        $this->call((RegionDatabase::class));
        $this->call((ProvinceDatabase::class));
        $this->call((UserInforDatabase::class));
        $this->call((ImportInvoiceDatabase::class));
        $this->call((ImportInvoiceDetailDatabase::class));
        $this->call((SalesInvoiceStatusDatabase::class));
        $this->call((SalesInvoiceDatabase::class));
        $this->call((SalesInvoiceDetailDatabase::class));
    }
}
