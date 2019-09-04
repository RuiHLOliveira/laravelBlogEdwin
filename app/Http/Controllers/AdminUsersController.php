<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('admin.users.index', compact(
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact(
            'roles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|max:255',
            'status' => 'required|max:255',
            'pass' => 'required|max:255',
            'photo' => 'mimes:jpeg,png,jpg'
        ]);
        $validatedData['password'] = Hash::make($validatedData['pass']);
        $validatedData['is_active'] = $validatedData['status'] == 'active' ? 1 : 0;
        $validatedData['role_id'] = Role::where('name', $validatedData['role'])->first()->id;
        if(isset($validatedData['photo'])) {
            $filename = date('Y-m-d')."_".$validatedData['photo']->getClientOriginalName();
            $result = $validatedData['photo']->move('images',$filename);
            $photo = Photo::create(['file' => $filename]);
            $validatedData['photo_id'] = $photo->id;
        }
        $result = User::create($validatedData);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return array('this is the adminusers show route');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact(
            'roles',
            'user'
        ));
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
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|max:255',
            'status' => 'required|max:255',
            'pass' => 'max:255',
            'photo' => 'mimes:jpeg,png,jpg'
        ]);

        $validatedData['is_active'] = $validatedData['status'] == 'active' ? 1 : 0;
        $validatedData['role_id'] = Role::where('name', $validatedData['role'])->first()->id;
        
        if(isset($validatedData['pass'])) {
            $validatedData['password'] = Hash::make($validatedData['pass']);
        }
        if(isset($validatedData['photo'])) {
            $filename = date('Y-m-d')."_".$validatedData['photo']->getClientOriginalName();
            $result = $validatedData['photo']->move('images',$filename);
            $photo = Photo::create(['file' => $filename]);
            $validatedData['photo_id'] = $photo->id;
        }
        $result = $user->update($validatedData);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->photo != null ) {
            unlink(public_path().'\\images\\'.$user->photo->file);
        }
        $user->delete();
        return redirect(route('users.index'));
    }
}
