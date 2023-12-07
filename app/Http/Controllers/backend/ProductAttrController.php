<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use App\Models\backend\ProductAttributeLink;
use App\Models\backend\ProductVariance;
use Illuminate\Http\Request;
use Exception;

class ProductAttrController extends Controller
{
    public function product_index($id)
    {
        $product = Product::find($id);
        // dd($product);
        $product_attr = $product->attributes;
        $no = 1;
        return view('backend.productattr.index', compact('product_attr', 'product', 'no', 'id'));
    }

    public function product_attribute_save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        foreach ($data['name'] as $key => $value) {
            # code...
            //dd( $data['name'][$key]);
            $attributes = new ProductAttributeLink();
            $attributes->product_id = $request->product_id;
            $attributes->name = $data['name'][$key];
            $attributes->description = $data['description'][$key];
            $attributes->save();
        }

        $product = Product::find($request->product_id);
        $product_attr = $product->attributes;
        $desc = [];
        foreach ($product_attr as $key => $value) {
            # code...
            //dd($value['name'], $product_attr[$key]['description']);
            // $description += [$value['name']=>$product_attr[$key]['description']];
            $desc += [$key => $product_attr[$key]['description']];
        }

        // dd($desc);

        for ($i = 0; $i < count($desc); $i++) {
            # code...
            // $i = $desc[$i];
            $explode = explode('|', $desc[$i]);
            $mix_arr[$i] = $explode;
        }

        // dd($mix_arr);
        $data = $this->get_combinations($mix_arr);

        // dd($data);
        $jj = (count($data));
        for ($i = 0; $i < $jj; $i++) {
            # code...
            $data1 = new ProductVariance();
            $data1->product_id = $product->id;
            $data1->selected_values = json_encode($data[$i]);
            // /dd($data1);
            $data1->save();
        }

        return redirect()->back()->with('flash_success', 'Successfully Attribute Created Check below.');
    }

    public function product_attribute_delete($id)
    {
        $data = ProductAttributeLink::find($id);
        $variance = ProductVariance::where('product_id', $data->product_id)->get();
        // dd($data, $variance);
        for ($i = 0; $i < count($variance); $i++) {
            # code...
            $variance[$i]->delete();
        }
        $data->delete();
        return redirect()->back()->with('success', 'Product Attribute Deleted');
    }


    public function product_variance($id)
    {
        //dd($id);
        $product = Product::find($id);
        $product_attr = $product->attributes;
        // $product_attr_desc = $product_attr->description;

        //dd($product_attr);
        $description = [];
        $desc = [];
        foreach ($product_attr as $key => $value) {
            # code...
            //dd($value['name'], $product_attr[$key]['description']);
            $description += [$value['name'] => $product_attr[$key]['description']];
            $desc += [$key => $product_attr[$key]['description']];
        }

        $no = 1;

        $product_vari = $product->variance;
        //dd($description, $product_attr, $product,$description , $no,  $product_vari);
        return view('backend.productvariance.index', compact('product_attr', 'product', 'description', 'no', 'product_vari', 'id'));
    }

    function get_combinations($arrays)
    {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }


    public function product_variance_save(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'selected_values' => 'required'
        ]);

        if ($validator->fails()) {
            return \Redirect::back()->with('error', 'Validataion failed select values');
        }

        $data = $request->all();
        unset($data['_token']);

        $data['selected_values'] = json_encode($request->selected_values);
        //dd($data);
        ProductVariance::create($data);
        return redirect()->back()->with('success', 'Successfully Created');
        //dd($data);

    }

    public function image_upload(Request $request)
    {
        //dd($id);
        try {
            if (!$request->image) {
                # code...
                throw new Exception('Plese select Image');
            } else {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs("attribute_image", $filename, 'public');
                $attr = ProductVariance::find($request->attribute_id);
                $attr->image = 'storage/attribute_image/' . $filename;
                $attr->save();
                return redirect()->back()->with('success', 'Image Uploaded.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function product_attribute_delete_images($id)
    {
        $data = ProductAttributeLink::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Product Attribute Deleted');
    }
}
