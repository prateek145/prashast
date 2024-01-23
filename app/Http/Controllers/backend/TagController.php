<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tags = Tags::latest()->get();
            $count = 1;
            return view('backend.tags.index', compact('tags', 'count'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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
            return view('backend.tags.create');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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
            'name' => 'required|unique:tags',
            'status' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['user_id'] = auth()->id();
            // dd($data);
            Tags::create($data);
            return redirect()->route('tags.index')->with('success', 'Tags Created Success');
            // dd($request->all());
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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
            $tag = Tags::find($id);
            return view('backend.tags.edit', compact('tag'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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
            'name' => 'required|unique:tags,name,' . $id .  "'",
            'status' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            // dd($data);
            $user = Tags::find($id);
            $user->update($data);
            return redirect()->back()->with('success','Successfully Tags Updated.');
            
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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

    public function tag_create(Request $request){
        // $rules = [
        //     'name' => 'required|unique:tags',
        // ];

        // $custommessage = [];

        // $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            // dd($data);
            unset($data['_token']);

            $tag = Tags::where('name', $request->name)->first();
            // dd($tag);
            if ($tag) {
                # code...
            } else {
                # code...
                $data['status'] = 1;
                $data['user_id'] = auth()->id();
                $tag = Tags::create($data);
            }
            // dd($tag);
            return response()->json([
                'status'=>200,
                'message' => 'Successfully created',
                'data' => $tag
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status'=>404,
                'message' => $e->getMessage(),
                'data' => []
            ]);
        }
    }

    public function tag_search(Request $request){
        try {
            $tags = Tags::where('status', 1)->where('name', 'like', '%' . $request->key . '%')->get();
            // dd($tags);
            return response()->json([
                'status'=>200,
                'message' => 'Successfully Fetched.',
                'data' => $tags
            ]);
            
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
