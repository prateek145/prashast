<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $categories = ProductCategories::latest()->get();
            $count = 1;
            return view('backend.products-categories.index', compact('categories', 'count'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
            return view('backend.products-categories.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        $rules = [
            'name' => 'required|max:100|unique:product_categories',
            'status' => 'required'

        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);

        try {
            $data = $request->all();

            if ($request->featured_image) {
                # code...
                $image = $request->featured_image;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                // $image_resize = Image::make($image->getRealPath());
                // $image_resize->resize(400, 400);
                $destination_path = public_path('/productcategory');
                $image->move($destination_path, $filename);
                unset($data['featured_image']);
                $data['featured_image'] = $filename;
            }
            $data['slug'] = Str::slug($request->name);
            unset($data['_token']);
            ProductCategories::create($data);
            return redirect()->route('products-categories.index')->with('success', 'Successfully ' . $request->name . ' Created');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
            $productcategories = ProductCategories::where(['id' => $id])->first();
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
            //dd($id);
            $productcategories = ProductCategories::where('id', $id)->first();
            return view('backend.products-categories.edit', compact('productcategories'));
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
            'name' => 'required|max:100|unique:product_categories,name,' . $id .  "'",

        ];

        $custommessages = [
            'name.required' => 'Name is required',

        ];

        $this->validate($request, $rules, $custommessages);

        try {
            $data = $request->all();
            unset($data['_method']);
            unset($data['_token']);
            $productcategories = ProductCategories::where(['id' => $id])->first();


            if ($request->featured_image) {
                # code...
                if ($productcategories->featured_image) {
                    # code...
                    $destination_path = public_path('productcategory/' . $productcategories->featured_image);
                    unlink($destination_path);
                }

                $image = $request->featured_image;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                // $image_resize = Image::make($image->getRealPath());
                // $image_resize->resize(400, 400);
                $destination_path = public_path('/productcategory');
                $image->move($destination_path, $filename);
                unset($data['featured_image']);
                $data['featured_image'] = $filename;
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
            ProductCategories::destroy($id);
            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
