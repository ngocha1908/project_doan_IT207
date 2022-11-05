<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            ['product_id' => 1, 'name' => 'ao-khoac.jpg'],
            ['product_id' => 2, 'name' => 'ao-nu-phoi-vien.jpg'],
            ['product_id' => 3, 'name' => 'ao-nu-so-mi-co-co-duc.jpg'],
            ['product_id' => 4, 'name' => 'quan-kaki-do-man-qk162-8273.jpg'],
            ['product_id' => 5, 'name' => 'ao-nu-so-mi-cham-bi.jpg'],
            ['product_id' => 6, 'name' => 'ao-khoac.jpg'],
            ['product_id' => 7, 'name' => 'ao-nu-phoi-vien.jpg'],
            ['product_id' => 8, 'name' => 'ao-nu-so-mi-co-co-duc.jpg'],
            ['product_id' => 9, 'name' => 'quan-kaki-do-man-qk162-8273.jpg'],
            ['product_id' => 10, 'name' => 'ao-nu-so-mi-cham-bi.jpg'],
            ['product_id' => 11, 'name' => 'ao-khoac.jpg'],
            ['product_id' => 12, 'name' => 'ao-nu-phoi-vien.jpg'],
            ['product_id' => 13, 'name' => 'ao-nu-so-mi-co-co-duc.jpg'],
            ['product_id' => 14, 'name' => 'quan-kaki-do-man-qk162-8273.jpg'],
            ['product_id' => 15, 'name' => 'ao-nu-so-mi-cham-bi.jpg'],
            ['product_id' => 16, 'name' => 'ao-khoac.jpg'],
            ['product_id' => 17, 'name' => 'ao-nu-phoi-vien.jpg'],
            ['product_id' => 18, 'name' => 'ao-nu-so-mi-co-co-duc.jpg'],
            ['product_id' => 19, 'name' => 'quan-kaki-do-man-qk162-8273.jpg'],
            ['product_id' => 20, 'name' => 'ao-nu-so-mi-cham-bi.jpg'],
        ];
        DB::table('images')->delete();
        DB::table('images')->insert($images);
    }
}
