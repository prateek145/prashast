<?php

namespace App\Imports;

use App\Models\backend\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Product([
            //
      
            'name'     => $row[0],
            'sku'    => $row[1], 
            'product_type'     => 'simple_product',
            'regular_price'    => 'null', 
            'sale_price'     => intval($row[2]),
            'show_in_featuredproduct'    => 0, 
            'weight'     => null,
            'height'    => null, 
            'width'     => null,
            'length'    => null, 
            'quantity'    => intval($row[3]), 
            'specification'     => $row[4],
            'desiner_id'    => null, 
            'product_categories'     => null,
            'product_subcategories'    => $row[5], 
            'publish_datetime'     => null,
            'featured_image'    => $row[6], 

            'image'    => $row[7], 
            'description'     => $row[8],
            'tag_selection'    => $row[9], 
            'meta_title'     => $row[10],
            'cannonical_link'    => null, 
            'slug'    => str_slug($row[0]), 
            'meta_description'     => $row[11],
            'meta_keywords'    => $row[12],
            'status'    => intval(1),
            'created_by'    => auth()->id(),
        ]);
    }
}
