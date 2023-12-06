<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (new User)->allUsers();
        return view('backend.user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateForm($request);
        $user = (new User)->storeUser($request->all());
        return redirect()->back()->with('message', 'The user is created successfully');
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
        $user = (new user)->findUser($id);
        return view('backend.user.edit', compact('user'));
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
//        $data = $this->validateForm($request);
        $user = (new user)->updateUser($request->all(), $id);
        return redirect()->route('user.index')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id){
            return redirect()->route('user.index')->with('message','You can not delete yourself!');
        }
        $user = (new User)->deleteUser($id);
        return redirect()->route('user.index')->with('message','User deleted successfully');
    }

    public function validateForm($request)
    {
        return $this->validate($request,
            [
                'name'       => 'required',
                'email'      => 'required|unique:users',
                'password'   => 'required|min:6',
//                'occupation' => 'required',
//                'address'    => 'required',
//                'phone'      => 'required',
            ]);
    }
}
