<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Blog;
use App\Models\backend\FooterImages;
use App\Models\backend\PageImages;
use App\Models\backend\Pages;
use App\Models\backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\backend\ProductCategories;
use App\Models\backend\ProductSubcategory;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pages = Pages::latest()->get();
            return view('backend.pages.index', ['pages' => $pages])->with('no', 1);
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
            return view('backend.pages.create');
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
        try {
            $rules = [
                'name' => 'required|max:100'
            ];
    
            $custommessages = [
                'name.required' => 'Name is required'
            ];
    
            $this->validate($request, $rules, $custommessages);
    
            $data = $request->all();
            // if ($request->featured_image) {
            //     # code...
            //     $image = $request->featured_image;
            //     $filename = rand() . $image->getClientOriginalName();
            //     $image_resize = Image::make($image->getRealPath());
            //     $image_resize->resize(400, 400);
            //     $image_resize->save(storage_path('app/public/user_profile/' . $filename));
            //     unset($data['featured_image']);
            //     $data['featured_image'] = $filename;
            // }
            unset($data['_token']);
            $data['slug'] = Str::slug($request->name);
            Pages::create($data);
            return redirect()->route('pages.index')->with('success', 'Successfully ' . $request->name . ' Created');
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
            $page = Pages::where(['id' => $id])->first();
            return view('backend.pages.show', compact('page'))->with('no', 1);
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
            $page = Pages::where('id', $id)->first();
            return view('backend.pages.edit', compact('page'));
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
        try {
            $rules = [
                'name' => 'required|max:100',
                'content' => 'required'
            ];

            $custommessages = [
                'name.required' => 'Name is required',
                'content.required' => 'Content is required'
            ];

            $this->validate($request, $rules, $custommessages);

            $data = $request->all();
            $page = Pages::where(['id' => $id])->first();
            $page->update($data);
            return redirect()->back()->with('success', 'Succesfully ' . $request->name . ' Updated');
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
            Pages::destroy($id);
            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function my_account()
    {
        if (auth()->user()->role == 'admin') {
            # code...
            return redirect()->route('home');
        } else {
            # code...
            $sub_categories = ProductSubcategory::latest()->take(5)->get();
            $page_image = PageImages::where('name', 'my-account')->first();
            return view('frontend.myaccount', compact('sub_categories', 'page_image'));
        }
        
    }

    public function about_us(){
        $page_image = PageImages::where('name', 'about-us')->first();
        $page = Pages::where('slug', 'about-us')->first();
        $footer_image = FooterImages::latest()->first();
        // dd($page);
        return view('frontend.dynamicp', compact('page', 'page_image', 'footer_image'));
    }

    public function blogs(){
        $page_image = PageImages::where('name', 'blogs')->first();
        $blogs = Blog::where('status', 1)->latest()->get();
        $footer_image = FooterImages::latest()->first();
        // dd($page, $page_image, $footer_image);
        return view('frontend.blogs', compact('page_image', 'footer_image', 'blogs'));
    }

    public function blogs_show($id){
        $page_image = PageImages::where('name', 'blogs')->first();
        $blog = Blog::find($id);
        $footer_image = FooterImages::latest()->first();
        return view('frontend.blogshow', compact('page_image', 'footer_image', 'blog'));
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function page_dynamic($slug){
        $page_image = PageImages::where('name', 'dynamic')->first();
        $page = Pages::where('slug', $slug)->first();
        $footer_image = FooterImages::latest()->first();
        // dd($page, $page_image, $footer_image);
        return view('frontend.dynamicp', compact('page', 'page_image', 'footer_image'));
    }

}
