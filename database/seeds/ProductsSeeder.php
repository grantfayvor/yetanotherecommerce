<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([[
            'id' => 1,
            'name' => 'GUCCI SHIRT',
            'brand' => 'GUCCI',
            'category_id' => 1,
            'details' => 'Number 1 Gucci shirt',
            'selling_price' => '160000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'HOT'
        ], [
            'id' => 2,
            'name' => 'Ralph & Lauren Shirt',
            'brand' => 'Ralph & Lauren',
            'category_id' => 1,
            'details' => 'Number 1 Ralph & Lauren Shirt',
            'selling_price' => '160000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'HOT'
        ], [
            'id' => 3,
            'name' => 'Marks & Spencer Shoe',
            'brand' => 'Marks & Spencer',
            'category_id' => 2,
            'details' => 'Number 1 Marks & Spencer shoe',
            'selling_price' => '156000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 4,
            'name' => 'Calvin Klein Jeans',
            'brand' => 'Calvin Klein',
            'category_id' => 3,
            'details' => 'Number 1 Calvin Klein jeam',
            'selling_price' => '140000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 5,
            'name' => 'Zara dress',
            'brand' => 'Zara',
            'category_id' => 1,
            'details' => 'Number 1 Zara dress',
            'selling_price' => '100000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 6,
            'name' => 'Nike X Canvas',
            'brand' => 'Nike',
            'category_id' => 2,
            'details' => 'Number 1 Nike canvas',
            'selling_price' => '130000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 7,
            'name' => 'Addidas Canvas',
            'brand' => 'Addidas',
            'category_id' => 2,
            'details' => 'Number 1 Addidas canvas',
            'selling_price' => '165000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 8,
            'name' => 'Puma Canvas',
            'brand' => 'Puma',
            'category_id' => 2,
            'details' => 'Number 1 Puma canvas',
            'selling_price' => '120000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 9,
            'name' => 'Dolce & Gabbanna Shirt',
            'brand' => 'Dolce & Gabbanna',
            'category_id' => 1,
            'details' => 'Number 1 Dolce & Gabbanna shirt',
            'selling_price' => '110000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ], [
            'id' => 10,
            'name' => 'Dolce & Gabbanna Shoe',
            'brand' => 'Dolce & Gabbanna',
            'category_id' => 2,
            'details' => 'Number 1 Dolce & Gabbanna shoe',
            'selling_price' => '123000',
            'image_location' => 'assets/img/card-product-2.jpg',
            'status' => 'COLD'
        ]]);

    }
}
