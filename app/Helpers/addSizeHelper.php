<?php

use App\Models\Size;

if (!function_exists('addSizes')) {
    function addSizes($id, $size, $qty)
    {
        Size::create([
            'product_id' => $id,
            'size' => $size,
            'quantity' => $qty,
        ]);
    }
}

if (!function_exists('editSizes')) {
    function editSizes($size, $qty)
    {
        $size->update([
            'quantity' => $qty,
        ]);
    }
}
