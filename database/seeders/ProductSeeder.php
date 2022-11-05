<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['id' => 1, 'name' => 'Áo khoác xanh', 'code' => 'AK0011', 'slug' => 'ao-khoac-xanh', 'price' => 100000, 'description' => 'Áo khoác thu đông nam xanh', 'category_id' => 2],
            ['id' => 2, 'name' => 'Áo nữ phối viễn xanh', 'code' => 'AN0011', 'slug' => 'ao-nu-phoi-vien-xanh', 'price' => 150000, 'description' => 'Áo nữ phối viền xanh', 'category_id' => 5],
            ['id' => 3, 'name' => 'Áo nữ sơ mi cổ đúc xanh', 'code' => 'AN0021', 'slug' => 'ao-nu-so-mi-co-duc-xanh', 'price' => 350000, 'description' => 'Áo nữ sơ mi có cổ đúc xanh', 'category_id' => 5],
            ['id' => 4, 'name' => 'Quần kaki đỏ mận xanh', 'code' => 'KAKI1', 'slug' => 'quan-kaki-do-man-xanh', 'price' => 350000, 'description' => 'Quần kaki đỏ mận xanh', 'category_id' => 3],
            ['id' => 5, 'name' => 'Áo nữ sơ mi chấm bi xanh', 'code' => 'AN0031', 'slug' => 'ao-nu-so-mi-cham-bi-xanh', 'price' => 350000, 'description' => 'Áo nữ sơ mi chấm bi xanh', 'category_id' => 3],       
            ['id' => 6, 'name' => 'Áo khoác đỏ', 'code' => 'AK0012', 'slug' => 'ao-khoac-do', 'price' => 100000, 'description' => 'Áo khoác thu đông nam đỏ', 'category_id' => 2],
            ['id' => 7, 'name' => 'Áo nữ phối viễn đỏ', 'code' => 'AN0012', 'slug' => 'ao-nu-phoi-vien-do', 'price' => 150000, 'description' => 'Áo nữ phối viền đỏ', 'category_id' => 5],
            ['id' => 8, 'name' => 'Áo nữ sơ mi cổ đúc đỏ', 'code' => 'AN0022', 'slug' => 'ao-nu-so-mi-co-duc-do', 'price' => 350000, 'description' => 'Áo nữ sơ mi có cổ đúc đỏ', 'category_id' => 5],
            ['id' => 9, 'name' => 'Quần kaki đỏ mận đỏ', 'code' => 'KAKI2', 'slug' => 'quan-kaki-do-man-do', 'price' => 350000, 'description' => 'Quần kaki đỏ mận', 'category_id' => 3],
            ['id' => 10, 'name' => 'Áo nữ sơ mi chấm bi đỏ', 'code' => 'AN0032', 'slug' => 'ao-nu-so-mi-cham-bi-do', 'price' => 350000, 'description' => 'Áo nữ sơ mi chấm bi đỏ', 'category_id' => 3],
            ['id' => 11, 'name' => 'Áo khoác vàng', 'code' => 'AK0013', 'slug' => 'ao-khoac-vang', 'price' => 100000, 'description' => 'Áo khoác thu đông nam vàng', 'category_id' => 2],
            ['id' => 12, 'name' => 'Áo nữ phối viễn vàng', 'code' => 'AN0013', 'slug' => 'ao-nu-phoi-vien-vang', 'price' => 150000, 'description' => 'Áo nữ phối viền vàng', 'category_id' => 5],
            ['id' => 13, 'name' => 'Áo nữ sơ mi cổ đúc vàng', 'code' => 'AN0023', 'slug' => 'ao-nu-so-mi-co-duc-vang', 'price' => 350000, 'description' => 'Áo nữ sơ mi có cổ đúc vàng', 'category_id' => 5],
            ['id' => 14, 'name' => 'Quần kaki vàng mận vàng', 'code' => 'KAKI3', 'slug' => 'quan-kaki-do-man-vang', 'price' => 350000, 'description' => 'Quần kaki vàng mận', 'category_id' => 3],
            ['id' => 15, 'name' => 'Áo nữ sơ mi chấm bi vàng', 'code' => 'AN0033', 'slug' => 'ao-nu-so-mi-cham-bi-vang', 'price' => 350000, 'description' => 'Áo nữ sơ mi chấm bi vàng', 'category_id' => 3],
            ['id' => 16, 'name' => 'Áo khoác trắng', 'code' => 'AK0014', 'slug' => 'ao-khoac-trang', 'price' => 100000, 'description' => 'Áo khoác thu đông nam trắng', 'category_id' => 2],
            ['id' => 17, 'name' => 'Áo nữ phối viễn trắng', 'code' => 'AN0014', 'slug' => 'ao-nu-phoi-vien-trang', 'price' => 150000, 'description' => 'Áo nữ phối viền trắng', 'category_id' => 5],
            ['id' => 18, 'name' => 'Áo nữ sơ mi cổ đúc trắng', 'code' => 'AN0024', 'slug' => 'ao-nu-so-mi-co-duc-trang', 'price' => 350000, 'description' => 'Áo nữ sơ mi có cổ đúc trắng', 'category_id' => 5],
            ['id' => 19, 'name' => 'Quần kaki trắng mận trắng', 'code' => 'KAKI4', 'slug' => 'quan-kaki-do-man-trang', 'price' => 350000, 'description' => 'Quần kaki trắng mận', 'category_id' => 3],
            ['id' => 20, 'name' => 'Áo nữ sơ mi chấm bi trắng', 'code' => 'AN0034', 'slug' => 'ao-nu-so-mi-cham-bi-trang', 'price' => 350000, 'description' => 'Áo nữ sơ mi chấm bi trắng', 'category_id' => 3],
        ];
        DB::table('products')->delete();
        DB::table('products')->insert($products);
    }
}
