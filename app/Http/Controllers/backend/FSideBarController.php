<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\FsideBar;
use Illuminate\Http\Request;

class FSideBarController extends Controller
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
        $sidebar = FsideBar::latest()->first();
        return view('backend/sidebar/create', compact('sidebar'));
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

        ];

        $custommessages = [
            'description.required' => 'Description is required',

        ];

        $this->validate($request, $rules, $custommessages);
        try {
            $data = $request->all();
            // unset($data['_method']);
            unset($data['_token']);
            $data['created_by'] = auth()->id();
            $data['updated_by'] = auth()->id();

            $sidebar = FsideBar::find(1);
            if ($sidebar) {
                # code...
                FsideBar::update($data);
            } else {
                # code...
                FsideBar::create($data);
            }
            
        
            return redirect()->back()->with('Success', 'Successfully created.');

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
