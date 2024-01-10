<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ProductSubcategory;
use App\Models\backend\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategories = ProductSubcategory::latest()->get();
        $no = 1;
        return view('backend.product-subcategories.index', compact('productcategories', 'no'));
        try {
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
            
            return view('backend.product-subcategories.create');
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
            'name' => 'required|max:100|unique:product_subcategories',
            'status' => 'required',
            'featured_image' => 'required',
            'icon_image' => 'required',
            'dark_icon' => 'required',

        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);

        $data = $request->all();

        if ($request->featured_image) {
            # code...
            $image = $request->featured_image;
            $filename = rand() . $image->getClientoriginalName();
            // dd($filename);
            // $image_resize = Image::make($image->getRealPath());
            // $image_resize->resize(400, 400);
            $destination_path = public_path('/productsubcategory');
            $image->move($destination_path, $filename);
            unset($data['featured_image']);
            $data['featured_image'] = $filename;
        }

        if ($request->icon_image) {
            # code...
            $image = $request->icon_image;
            $filename = rand() . $image->getClientoriginalName();
            // dd($filename);
            // $image_resize = Image::make($image->getRealPath());
            // $image_resize->resize(400, 400);
            $destination_path = public_path('/productsubcategory');
            $image->move($destination_path, $filename);
            $data['icon_image'] = $filename;
        }

        if ($request->dark_icon) {
            # code...
            $image = $request->dark_icon;
            $filename = rand() . $image->getClientoriginalName();
            // dd($filename);
            // $image_resize = Image::make($image->getRealPath());
            // $image_resize->resize(400, 400);
            $destination_path = public_path('/productsubcategory');
            $image->move($destination_path, $filename);
            $data['dark_icon'] = $filename;
        }

        $data['slug'] = Str::slug($request->name);
        unset($data['_token']);
        ProductSubcategory::create($data);

        $pcategory = ProductCategories::find($request->parent_id);
        return redirect()->route('product-subcategories.index')->with('success', 'Successfully ' . $request->name . ' Created');
        try {
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured');
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
            $productcategories = ProductSubcategory::where(['id' => $id])->first();
            return view('backend.products-categories.show', compact('productcategories'))->with('no', 1);
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
            // dd($slug);
            $productcategories = ProductSubcategory::where('id', $id)->first();
            return view('backend.product-subcategories.edit', compact('productcategories'));
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
            'name' => 'required|max:100|unique:product_subcategories,name,' . $id .  "'",
            'status' => 'required',

        ];

        $custommessages = [
            'name.required' => 'Name is required',

        ];

        $this->validate($request, $rules, $custommessages);

        try {
            $data = $request->all();
            unset($data['_method']);
            unset($data['_token']);
            // dd($data);
            $productcategories = ProductSubcategory::where(['id' => $id])->first();
    
    
            if ($request->featured_image) {
                # code...
                // if ($productcategories->featured_image) {
                //     # code...
                //     $destination_path = public_path('productsubcategory/' . $productcategories->featured_image);
                //     unlink($destination_path);
                // }
    
                $image = $request->featured_image;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                // $image_resize = Image::make($image->getRealPath());
                // $image_resize->resize(400, 400);
                $destination_path = public_path('/productsubcategory');
                $image->move($destination_path, $filename);
                unset($data['featured_image']);
                $data['featured_image'] = $filename;
            }
    
            if ($request->icon_image) {
                # code...
                $image = $request->icon_image;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                // $image_resize = Image::make($image->getRealPath());
                // $image_resize->resize(400, 400);
                $destination_path = public_path('/productsubcategory');
                $image->move($destination_path, $filename);
                $data['icon_image'] = $filename;
            }
    
            if ($request->dark_icon) {
                # code...
                $image = $request->dark_icon;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                // $image_resize = Image::make($image->getRealPath());
                // $image_resize->resize(400, 400);
                $destination_path = public_path('/productsubcategory');
                $image->move($destination_path, $filename);
                $data['dark_icon'] = $filename;
            }
            $data['slug'] = Str::slug($request->name);
            $productcategories->update($data);
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
            ProductSubcategory::destroy($id);
            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
