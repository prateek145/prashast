<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\CampaignOffer;
use Illuminate\Http\Request;

class CampaignOfferController extends Controller
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
        $c_offer = CampaignOffer::latest()->first();
        // dd($c_offer);
        return view('backend/campainoffer/edit', compact('c_offer'));
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
            'description' => 'required',
            'status' => 'required',

        ];

        $custommessages = [
            'description.required' => 'Description is required',

        ];

        $this->validate($request, $rules, $custommessages);
        try {
            $data = $request->all();
            // unset($data['_method']);
            unset($data['_token']);

            $c_offer = CampaignOffer::latest()->first();
            // dd($data);
            if ($c_offer) {
                # code...
                $c_offer->update($data);
            } else {
                # code...
                CampaignOffer::create($data);
            }
            return redirect()->back()->with('success', 'Successfully created.');

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
