<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Desiner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DesinerConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Desiner::query();
        if (isset(request()->search) && !empty(request()->search)) {
            $search_text = request()->search;
            $query->where('name', 'LIKE', "%{$search_text}%");
            // ->orWhere('short_description', 'LIKE', "%{$search_text}%")
            // ->orWhere('meta_description', 'LIKE', "%{$search_text}%")
            // ->orWhere('email', 'LIKE', "%{$search_text}%");
        }
        $desiners = $query->orderBy('id')->paginate(10);
        return view('backend.desiners.index', ['desiners' => $desiners])->with('no', 1);
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

            return view('backend.desiners.create');
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
            'name' => 'required|max:100'
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
            $destination_path = public_path('/desiners');
            $image->move($destination_path, $filename);
            unset($data['featured_image']);
            $data['featured_image'] = $filename;
        }

        $data['slug'] = Str::slug($request->name);
        unset($data['_token']);
        Desiner::create($data);
        return redirect()->route('desiners.index')->with('success', 'Successfully ' . $request->name . ' Created');
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
            $user = User::where(['id' => $id])->first();
            return view('backend.users.show', compact('user'))->with('no', 1);
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
            $desiner = Desiner::where('id', $id)->first();
            return view('backend.desiners.edit', compact('desiner'));
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
            'name' => 'required|max:100'
        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);

        $data = $request->all();


        $desiner = Desiner::where(['id' => $id])->first();

        if ($request->featured_image) {
            # code...

            if ($desiner->featured_image) {
                # code...
                $destination_path = public_path('desiners/' . $desiner->featured_image);
                unlink($destination_path);
            }
            $image = $request->featured_image;
            $filename = rand() . $image->getClientoriginalName();
            // dd($filename);
            // $image_resize = Image::make($image->getRealPath());
            // $image_resize->resize(400, 400);
            $destination_path = public_path('/desiners');
            $image->move($destination_path, $filename);
            unset($data['featured_image']);
            $data['featured_image'] = $filename;
        }
        $data['slug'] = Str::slug($request->name);

        $desiner->update($data);
        return redirect()->back()->with('success', 'Succesfully ' . $request->name . ' Updated');
        try {
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
            Desiner::destroy($id);
            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function dynamic_desiners($slug)
    {
        try {
            //code...
            $desiner = Desiner::where('slug', $slug)->first();
            $products = $desiner->desiner_products()->get();
            // dd($desiner);
            return view('frontend.dynamic_desiners', compact('products', 'desiner'));
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
