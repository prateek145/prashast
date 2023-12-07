<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        try {
            $query = User::query();
            if (isset(request()->search) && !empty(request()->search)) {
                $search_text = request()->search;
                $query->where('name', 'LIKE', "%{$search_text}%")
                    // ->orWhere('short_description', 'LIKE', "%{$search_text}%")
                    // ->orWhere('meta_description', 'LIKE', "%{$search_text}%")
                    ->orWhere('email', 'LIKE', "%{$search_text}%");
            }
            $user = $query->orderBy('id')->paginate(10);
            return view('backend.users.index', ['users' => $user])->with('no', 1);
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

            return view('backend.users.create');
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
            'email' => 'required',

        ];

        $custommessages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
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
        unset($data['password']);
        unset($data['repassword']);
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'Successfully ' . $request->name . ' Created');
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
            $user = User::where('id', $id)->first();
            $selectedRole = $user->role;
            return view('backend.users.edit', compact('user', 'selectedRole'));
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


        $user = User::where(['id' => $id])->first();


        // if ($request->featured_image) {
        //     # code...
        //     if ($user->featured_image) {
        //         # code...
        //         // unlink(storage_path('app/public/user_profile/'. $user->featured_image));
        //     }

        //     $image = $request->featured_image;
        //     $filename = rand() . $image->getClientOriginalName();
        //     $image_resize = Image::make($image->getRealPath());
        //     $image_resize->resize(400, 400);
        //     $image_resize->save(storage_path('app/public/user_profile/' . $filename));
        //     unset($data['featured_image']);
        //     $data['featured_image'] = $filename;
        // }

        $user->update($data);
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
            User::destroy($id);
            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
