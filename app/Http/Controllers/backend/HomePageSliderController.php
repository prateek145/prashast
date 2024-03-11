<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\HomePageSlider;
use Illuminate\Http\Request;

class HomePageSliderController extends Controller
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
        $home_slider = HomePageSlider::latest()->first();
        return view('backend/homepageslider.edit', compact('home_slider'));
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

            $home_slider = HomePageSlider::latest()->first();
            $data = $request->all();

            if ($home_slider) {
                # code...
                $banners = json_decode($home_slider->images, true);
                $links = json_decode($home_slider->links, true);

                if ($request->images) {
                    # code...
                    unset($data['images']);
                    unset($data['_token']);
                    unset($data['links']);

                    $image_arr = [];
                    // dd($request->images);
                    // dd($home_slider);

                    for ($i = 0; $i < count($request->images); $i++) {
                        # code...
                        $image = $request->images[$i];
                        $filename = rand() . $image->getClientoriginalName();
                        // dd($filename);
                        $destination_path = public_path('/homeslider');
                        $image->move($destination_path, $filename);
                        $image_arr[] = $filename;
                    }
                    $data['images'] = json_encode(array_merge($banners, $image_arr));
                }

                $data['links'] = json_encode(array_merge($links, $request->links));
                $home_slider->update($data);
                return redirect()->back()->with('success', 'Success Shop Page Slider Updated.');
            } else {
                # code...
                if ($request->images) {
                    # code...
                    unset($data['images']);
                    unset($data['_token']);
                    unset($data['links']);
                    $image_arr = [];
                    // dd($request->images);
                    for ($i = 0; $i < count($request->images); $i++) {
                        # code...
                        $image = $request->images[$i];
                        $filename = rand() . $image->getClientoriginalName();
                        // dd($filename);
                        $destination_path = public_path('/homeslider');
                        $image->move($destination_path, $filename);
                        $image_arr[] = $filename;
                    }
                    $data['images'] = json_encode($image_arr);
                }
                $data['links'] = json_encode($request->links);
                // dd($data);
                HomePageSlider::create($data);
                return redirect()->back()->with('success', 'Success Home Page Slider Created.');
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
        try {
            $home_slider = HomePageSlider::latest()->first();
            $images = json_decode($home_slider->images, true);
            $links = json_decode($home_slider->links, true);

            foreach ($images as $key => $value) {
                if ($key == $id) {
                    # code...
                    unset($images[$key]);
                }
            }

            foreach ($links as $key => $value) {
                if ($key == $id) {
                    # code...
                    unset($links[$key]);
                }
            }

            $home_slider->images = json_encode($images);
            $home_slider->links = json_encode($links);
            $home_slider->save();
            return redirect()->back()->with('success', 'Image Successfully Deleted.');
        } catch (\Exception $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
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
