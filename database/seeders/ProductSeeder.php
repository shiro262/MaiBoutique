<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Suisei T-Shirt',
            'price' => 10000,
            'detail' => 'T-shirt for Hoshiyomi!',
            'image' => 'sui.jpg'
        ]);
        Product::create([
            'name' => 'Towa T-Shirt',
            'price' => 10000,
            'detail' => 'T-shirt for Kenzoku!',
            'image' => 'towa.jpg'
        ]);
        Product::create([
            'name' => 'Red T-Shirt',
            'price' => 10000,
            'detail' => 'T-shirt for you!',
            'image' => 'red.jpg'
        ]);
        Product::create([
            'name' => 'Black Towa T-Shirt',
            'price' => 10000,
            'detail' => 'T-shirt for Kenzoku!',
            'image' => 'towablack.jpg'
        ]);
        Product::create([
            'name' => 'Rushia Smug T-Shirt',
            'price' => 10000,
            'detail' => 'T-shirt for Fandead!',
            'image' => 'ru.jpg'
        ]);
        Product::create([
            'name' => 'Faith Industries - Crewneck Devil Jin',
            'price' => 10000,
            'detail' => 'From Faith x Tekken Collaboration!',
            'image' => 'faithdeviljin.jpg'
        ]);
        Product::create([
            'name' => 'Green Short',
            'price' => 10000,
            'detail' => 'Short for you!',
            'image' => 'greenshort.jpg'
        ]);
        Product::create([
            'name' => 'Nike Sport Short',
            'price' => 10000,
            'detail' => 'Short for you!',
            'image' => 'nikeshort.jpg'
        ]);
        Product::create([
            'name' => 'Adidas Short',
            'price' => 10000,
            'detail' => 'Short for you!',
            'image' => 'adidasshort.jpg'
        ]);
        Product::create([
            'name' => 'Black Vans Short',
            'price' => 10000,
            'detail' => 'Short for you!',
            'image' => 'blackvansshort.jpg'
        ]);
    }
}
