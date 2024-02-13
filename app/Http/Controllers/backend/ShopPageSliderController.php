<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ShopPageSlider;
use Illuminate\Http\Request;

class ShopPageSliderController extends Controller
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
        $shop_slider = ShopPageSlider::find(1);
        // dd($shop_slider);
        return view('backend/shoppageslider.edit', compact('shop_slider'));
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
            // dd($request->all());
            $shop_slider = ShopPageSlider::find(1);
            $data = $request->all();
    
            if ($shop_slider) {
                # code...
                // dd($shop_slider);
                if ($request->images) {
                    # code...
                    unset($data['images']);
                    unset($data['_token']);
                    $image_arr = [];
                    // dd($request->images);
                    for ($i = 0; $i < count($request->images); $i++) {
                        # code...
                        $image = $request->images[$i];
                        $filename = rand() . $image->getClientoriginalName();
                        // dd($filename);
                        $destination_path = public_path('/shopslider');
                        $image->move($destination_path, $filename);
                        $image_arr[] = $filename;
                    }
                    $data['images'] = json_encode($image_arr);
                }
                $shop_slider->update($data);
                return redirect()->back()->with('success', 'Success Shop Page Slider Updated.');
    
            } else {
                # code...
                if ($request->images) {
                    # code...
                    unset($data['images']);
                    unset($data['_token']);
                    $image_arr = [];
                    // dd($request->images);
                    for ($i = 0; $i < count($request->images); $i++) {
                        # code...
                        $image = $request->images[$i];
                        $filename = rand() . $image->getClientoriginalName();
                        // dd($filename);
                        $destination_path = public_path('/shopslider');
                        $image->move($destination_path, $filename);
                        $image_arr[] = $filename;
                    }
                    $data['images'] = json_encode($image_arr);
                }
                // dd($data);
                ShopPageSlider::create($data);
                return redirect()->back()->with('success', 'Success Shop Page Slider Created.');
            }
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
        //
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
        //
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
