<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Gate::denies('logged-in')){
            return view('welcome');
        }

        if(Gate::allows('is-admin')){
          return view('admin.users.index')->with(['users' => User::paginate(10)]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Roles::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreUserRequest $request)
    {
        /**$validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users',
                'password' => 'required|min:8|max:255'
            ]
        ); */
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());
 
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'User '. $user->name.' is added to the list');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        User::find($id)
        ->update(['status' => 1]);

        $request->session()->flash('success', 'You have reactivated the user');
        //dd($deactivate);
        return redirect(route('admin.users.index'));
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
        return view('admin.users.edit',
         [
             'roles' => Roles::all(),
             'user' => User::find($id)
        ]);
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
        $user = User::find($id);

        if(!$user){
            $request->session()->flash('error', 'Error. User does not exist');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));
        
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'You have edited the user');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        User::find($id)
        ->update(['status' => 0]);

        $request->session()->flash('success', 'You have deactivated the user');
        //dd($deactivate);
        return redirect(route('admin.users.index'));
    }
}
