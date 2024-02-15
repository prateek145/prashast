<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $blogs = Blog::latest()->get();
            $no = 1;
            return view('backend.blogs.index', compact('blogs', 'no'));
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
            return view('backend.blogs.create');
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
        $rules = [
            'name' => 'required|max:100',
            'image' => 'required',
            'status' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);

        try {
            $data = $request->all();
            if ($request->image) {
                # code...
                $image = $request->image;
                $filename = rand() . $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(800, 400);
                $image_resize->save(public_path('blogs/' . $filename));
                unset($data['image']);
                $data['image'] = $filename;
            }
            unset($data['_token']);
            $data['slug'] = Str::slug($request->name);
            Blog::create($data);
            return redirect()->route('blog.index')->with('success', 'Successfully ' . $request->name . ' Created');
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
        //
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
            $blog = Blog::find($id);
            return view('backend.blogs.edit', compact('blog'));
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
            'name' => 'required|max:100',
            'image' => 'required',
            'status' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ];

        $custommessages = [

        ];

        $this->validate($request, $rules, $custommessages);
        try {

            $data = $request->all();
            $blog = Blog::find($id);
            if ($request->image) {
                # code...
                $image = $request->image;
                $filename = rand() . $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(800, 400);
                $image_resize->save(public_path('blogs/' . $filename));
                unset($data['image']);
                $data['image'] = $filename;
            }
            $blog->update($data);
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
        //
    }
}
