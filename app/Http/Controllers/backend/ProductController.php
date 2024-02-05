<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Desiner;
use App\Models\backend\Product;
use App\Models\backend\ProductCategories;
use App\Models\backend\ProductSubcategory;
use App\Models\backend\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $query = Product::query();
            if (isset(request()->search) && !empty(request()->search)) {
                $search_text = request()->search;
                $query->where('name', 'LIKE', "%{$search_text}%");
                // ->orWhere('short_description', 'LIKE', "%{$search_text}%")
                // ->orWhere('meta_description', 'LIKE', "%{$search_text}%")
                // ->orWhere('email', 'LIKE', "%{$search_text}%");
            }
            $product = $query->orderBy('id')->paginate(10);
            return view('backend.products.index', ['products' => $product])->with('no', 1);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $productcategories = ProductCategories::all();
            $productsubcategories = ProductSubcategory::all();
            $desiners = Desiner::all();
            return view('backend.products.create', compact('productcategories', 'desiners', 'productsubcategories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|unique:products',
            'sku' => 'required|unique:products',
            'sale_price' => 'required',
            'featured_image' => 'required|array|min:5|max:12',
            'image' => 'required',
            'description' => 'required',
            // 'product_categories' => 'required',
            'product_subcategories' => 'required',
            'tag_selection' => 'required|array',
            'status' => 'required',

        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);

        $data = $request->all();

        if ($request->featured_image) {
            # code...
            unset($data['featured_image']);
            $image_arr = [];
            for ($i = 0; $i < count($request->featured_image); $i++) {
                # code...
                $image = $request->featured_image[$i];
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                $destination_path = public_path('/product');
                $image->move($destination_path, $filename);
                $image_arr[] = $filename;
            }
            $data['featured_image'] = json_encode($image_arr);
        }

        if ($request->image) {
            # code...
            unset($data['image']);
            $image = $request->image;
            $filename = rand() . $image->getClientoriginalName();
            $destination_path = public_path('/product');
            $image_resize = Image::make($image->getRealPath())->resize(200, 200);
            $image_resize->save($destination_path . '/' . $filename);
            $data['image'] = $filename;
        }

        unset($data['_token']);
        unset($data['product_categories']);
        unset($data['product_subcategories']);
        unset($data['tag_selection']);
        $data['slug'] = Str::slug($request->name);
        // $data['product_categories'] = json_encode($request->product_categories);
        $data['tag_selection'] = json_encode(array_unique($request->tag_selection));
        $data['product_subcategories'] = json_encode($request->product_subcategories);

        // dd($data);
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Successfully ' . $request->name . ' Created');
        try {
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::where(['id' => $id])->first();
            return view('backend.products.show', compact('product'))->with('no', 1);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            //dd($id);
            $product = Product::where('id', $id)->first();
            $productsubcategories = ProductSubcategory::all();
            // dd($product);
            $tags = Tags::whereIn('id', json_decode($product->tag_selection))->get();
            // dd($tags);
            return view('backend.products.edit', compact('product', 'tags', 'productsubcategories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:products,name,' . $id .  "'",
            'sku' => 'required|unique:products,name,' . $id .  "'",
            'sale_price' => 'required',
            // 'featured_image' => 'required|array|min:5|max:12',
            // 'image' => 'required',
            'description' => 'required',
            // 'product_categories' => 'required',
            'product_subcategories' => 'required',
            'tag_selection' => 'required|array',
            'status' => 'required',

        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);

        try {
            $data = $request->all();
            // dd($request->all());
            $product = Product::find($id);

            if ($request->featured_image) {
                # code...

                if ($product->featured_image) {
                    # code...
                    $image = json_decode($product->featured_image, true);
                    for ($i = 0; $i < count($image); $i++) {
                        # code...
                        $destination_path = public_path('product/' . $image[$i]);
                        unlink($destination_path);
                    }
                }
                unset($data['featured_image']);
                $image_arr = [];
                for ($i = 0; $i < count($request->featured_image); $i++) {
                    # code...
                    $image = $request->featured_image[$i];
                    $filename = rand() . $image->getClientoriginalName();
                    // dd($filename);
                    $destination_path = public_path('/product');
                    $image->move($destination_path, $filename);
                    $image_arr[] = $filename;
                }
                $data['featured_image'] = json_encode($image_arr);
            }

            if ($request->image) {
                # code...
                unset($data['image']);
                $image = $request->image;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                $destination_path = public_path('/product');
                $image_resize = Image::make($image->getRealPath())->resize(200, 200);
                $image_resize->save($destination_path . '/' . $filename);
                $data['image'] = $filename;
            }

            unset($data['_token']);
            unset($data['product_subcategories']);
            unset($data['tag_selection']);
            $data['slug'] = Str::slug($request->name);
            $data['product_subcategories'] = json_encode($request->product_subcategories);
            $data['tag_selection'] = json_encode(array_unique($request->tag_selection));

            $product->update($data);
            return redirect()->back()->with('success', 'Succesfully ' . $request->name . ' Updated');
            //dd($request->all());

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);

            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
