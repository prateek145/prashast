<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\FooterImages;
use App\Models\backend\PageImages as BackendPageImages;
use App\Models\backend\ProductSubcategory;
use Illuminate\Http\Request;

class PageImages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageImages = BackendPageImages::latest()->get();
        $count =1 ;
        return view('backend.pageimages.create', compact('pageImages', 'count'));
        try {
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
        //
        $rules = [
            'name' => 'required|max:100',
            'status' => 'required',
            'images' => 'required'
        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);
        try {
            $data = $request->all();
            unset($data['_token']);
            if ($request->images) {
                # code...
                unset($data['images']);
                $image = $request->images;
                $filename = rand() . $image->getClientoriginalName();
                // dd($filename);
                $destination_path = public_path('/pageimages');
                $image->move($destination_path, $filename);
                $data['images'] = $filename;
            }
                    
            if ($request->specific_image && $request->name == 'shop') {
                # code...
                unset($data['specific_image']);
                $image_arr = [];
                for ($i = 0; $i < count($request->specific_image); $i++) {
                    # code...
                    $image = $request->specific_image[$i];
                    $filename = rand() . $image->getClientoriginalName();
                    // dd($filename);
                    $destination_path = public_path('/pageimages');
                    $image->move($destination_path, $filename);
                    $image_arr[] = $filename;
                }
                $data['specific_image'] = json_encode($image_arr);
            }

            BackendPageImages::create($data);
            return redirect()->back()->with('success', 'Successfully created.');

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
            $pageImage = BackendPageImages::where(['id' => $id])->first();
            $count = 1;
            return view('backend.pageimages.edit', compact('pageImage'))->with('count', 1);
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
        // dd($request->all());
        $rules = [
            'name' => 'required|max:100',
            'status' => 'required',
            // 'images' => 'required'
        ];

        $custommessages = [
            'name.required' => 'Name is required'
        ];

        $this->validate($request, $rules, $custommessages);
        $data = $request->all();
        unset($data['_token']);
        if ($request->images) {
            # code...
            unset($data['images']);
            $image = $request->images;
            $filename = rand() . $image->getClientoriginalName();
            $destination_path = public_path('/pageimages');
            $image->move($destination_path, $filename);
            $data['images'] = $filename;
        }

        if ($request->specific_image && $request->name == 'shop') {
            # code...
            unset($data['specific_image']);
            $image_arr = [];
            for ($i = 0; $i < count($request->specific_image); $i++) {
                # code...
                $image = $request->specific_image[$i];
                $filename = rand() . $image->getClientoriginalName();
                $destination_path = public_path('/pageimages');
                $image->move($destination_path, $filename);
                $image_arr[] = $filename;
            }
            $data['specific_image'] = json_encode($image_arr);
        }
        
        $pageImage = BackendPageImages::find($id);
        $pageImage->update($data);
        $pageImage->save();
        return redirect()->back()->with('success', 'Successfully created.');
        try {

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured');
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

    public function footer_image(){
        $footer_image = FooterImages::latest()->first();
        
        return view('backend/footerimage.create', compact('footer_image'));
    }

    public function footer_image_save(Request $request){
        $rules = [
            'images' => 'required',
        ];

        $custommessages = [
        ];

        $this->validate($request, $rules, $custommessages);
        
        $footer_image = FooterImages::latest()->first();
        $data = $request->all();
        if ($footer_image) {
            # code...
            unset($data['images']);
            unset($data['_token']);
            $image = $request->images;
            $filename = rand() . $image->getClientoriginalName();
            $destination_path = public_path('/pageimages');
            $image->move($destination_path, $filename);
            $data['image'] = $filename;
            $footer_image->update($data);
            return redirect()->back()->with('success', 'Success Updated Footer Image');

        } else {
            # code...
            unset($data['images']);
            unset($data['_token']);
            $image = $request->images;
            $filename = rand() . $image->getClientoriginalName();
            $destination_path = public_path('/pageimages');
            $image->move($destination_path, $filename);
            $data['image'] = $filename;
            FooterImages::create($data);
            return redirect()->back()->with('success', 'Success Created Footer Image');

        }
        try {

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured');
        }
    }
}
