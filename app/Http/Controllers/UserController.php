<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;   
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('manage-users'))
        {
            return redirect()->route('backend.index');
        }

        $users = User::all();
        return view('website.backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(Gate::denies('edit-user'))
        {
            return redirect()->route('user.index');
        }

        $users = User::findorFail($id);
        $roles = Role::all();

        return view('website.backend.user.edit',compact('users','roles'));
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
        $user = User::findorFail($request->id);
        //dd($request);
        $user->roles()->sync($request->roles);
        //dd($users);
        $user->name =  $request->name;
        $user->email =  $request->email;

        if ($user->save()) {
           $request->session()->flash('success', $user->name . ' has been updated');
        }
        else{
            $request->session()->flash('error','There was an error updating thr user');
        }
        

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-user'))
        {
            return redirect()->route('user.index');
        }

        $user = User::findorFail($id);
        $user->roles()->detach();

        if ($user->delete()) {
           $request->session()->flash('success', $user->name . ' has been deleted');
        }
        else{
            $request->session()->flash('error','There was an error deleted thr user');
        }


        return redirect()->route('user.index');
    }
}
