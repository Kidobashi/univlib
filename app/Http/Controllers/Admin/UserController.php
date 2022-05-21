<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\LibrarianUsers;
use App\Models\Logs;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\RolesUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $assign = User::query('category_id')
        ->join('librarian_users', 'librarian_users.user_id', '=', 'users.id')->paginate(10);

        $users = User::query('users.id', 'name', 'email')
        ->join('roles_user', 'user_id', '=', 'users.id')
        ->paginate(10);

        //$users = array_merge(['data' => $data], ['assign' => $assign]);

        if(Gate::denies('logged-in')){
            return view('welcome');
        }

        if(Gate::allows('is-admin')){
          return view('admin.users.index', ['users' => $users])->with(['assign' => $assign]);
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

        Logs::create([
            'actor' => Auth::user()->name,
            'action' => "added a new user",
        ]);

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
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        $request->session()->flash('success', 'You have reactivated the user');
        //dd($deactivate);
        Logs::create([
            'user_id' => $id,
            'actor' => Auth::user()->name,
            'action' => "reactivate",
        ]);

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

        if(!$id){
            $request->session()->flash('error', 'Error. User does not exist');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));

        $user->roles()->sync($request->roles);
        $request->session()->flash('succcess', 'You have edited the user');

        LibrarianUsers::create([
            'user_id' => $id,
            'category' => request('category')
        ]);

        Logs::create([
            'user_id' => $id,
            'actor' => Auth::user()->name,
            'action' => "edit",
        ]);

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
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        $request->session()->flash('success', 'You have deactivated the user');
        //dd($deactivate);

        Logs::create([
            'user_id' => $id,
            'actor' => Auth::user()->name,
            'action' => "deactivate",
        ]);

        return redirect(route('admin.users.index'));
    }

    public function showLibrarian($id,Request $request)
    {
        $user = User::find($id);

        LibrarianUsers::insert([
            'user_id' => $id,
            'category_id' => $request->category,
        ]);
        //$temp = $roles->user_id;

        // LibrarianUsers::insert([
         // 'user_id' => $roles->user_id,
        //    'category_id' => 1
        //]);
        //dd($request->user_id);
        //dd($roles);
        //dd($temp);

        return view('admin.users.index');
        //return view('admin.users.index', ['category' => $category])->with(['roles' => $roles]);
                                                                                                                                                                                                                                                                                                                                                                                                                }

    public function librarianCategory($id, $category){
        $category = DB::table('librarian_cat')
        ->select('id', 'category')
        ->get();

        DB::table('librarian_users')->insert([
            'user_id' => 2,
            'category_id' => 3
        ]);

        //dd($category);
        //return view('admin.showLibrarian.index', ['category' => $category]);
    }


    public function asssignLibrarian(Request $request){

        if(LibrarianUsers::where('user_id', $request->id)->exists())
        {
            $request->session()->flash('error', 'Librarian is already assigned');
        }
        else{
            $request->validate([
                'id' => 'required',
                'category' => 'required',
            ]);

            $data = LibrarianUsers::insert([
                'user_id' => $request->id,
                'category_id' => $request->category,
            ]);
            $request->session()->flash('success', 'Successfully assigned librarian');
        }
        return redirect()->route('admin.users.index');
    }
}
