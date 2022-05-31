@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="float-start">User Management</h1>
            <a class="btn btn-sm btn-success float-end" href="{{ route('admin.users.create') }}" role="button">Create</a>
        </div>
    </div>
    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href={{ route('admin.users.edit', $user->id) }} role="button">Edit</a>

                        @if($user->status == 1)
                        <a href="{{ route('register') }}"><button type="button" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault();
                        document.getElementById('deactivate-user-form-{{ $user->id }}').submit()" value="{{$user->status}}" >
                            Deactivate
                        </button></a>
                        @else
                        <button type="button" class="btn btn-sm btn-success"
                        onclick="event.preventDefault();
                        document.getElementById('reactivate-user-form-{{ $user->id }}').submit()" value="{{$user->status}}" >
                            Reactivate
                        </button>
                        @endif

                        <form id="reactivate-user-form-{{ $user->id }}" action="{{ route('admin.users.show', $user->id) }}" method="PUT" style="display: none">
                            @csrf
                            @method("PUT")
                        </form>

                        <form id="deactivate-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>

                    <?php

                    ?>

                    <td>
                        @if( implode('|', $user->roles()->get()->pluck('name')->toArray()) == "Librarian" )
                        <?php
                                $assignments = DB::table('librarian_users')->select('category_id')->where('user_id',$user->id)->first();

                                $ass = DB::table('librarian_cat')->select('id', 'category')->where('id', $assignments->category_id)->first();
                            ?>
                        <button onclick="sendData('{{$user->id}}', '{{$user->name}}')" title="{{ $ass->category }}" type="button" id="cat" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                            Librarian
                        </button>
                        <div class="hide" style=" float: right;">
                        </div>
                        @endif
                        @if(implode('|', $user->roles()->get()->pluck('name')->toArray()) == "Admin")
                        <button type="button" class="btn btn-success">
                            Administrator
                        </button>
                        @endif
                        @if( implode('|', $user->roles()->get()->pluck('name')->toArray()) == "User" )
                        <button type="button" class="btn btn-info">
                            User
                        </button>
                        @endif
                    </td>
                    @endforeach
                  </tr>
            </tbody>
          </table>
          {{ $users->links() }}

        <?php
            $roles = DB::table('roles_user')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('name', 'user_id', 'users.status')
            ->where('roles_id', 2)
            ->get();

            $category = DB::table('librarian_cat')
            ->select('id', 'category')
            ->get();
        ?>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#578F53;">
                  <h5 class="modal-title" id="exampleModalLabel" style="color:white; font-size: 25px;">      Assign <span id="modal-name"></span> as </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:black; font-size: 20px;">&times;</span>
                  </button>
                </div>
                <div class="modal-body d-flex justify-content-center">

                <form action="{{ url('assignLibrarian') }}" method="POST">
                @csrf
                    <input style="display:none;"id="modal-id" type="text" name="id" value="">
                        <select name="category" style="height:40px; border-radius: 3px; margin-right:25px;">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}" style="font-size: 20px; font-weight: bolder;">
                                        {{ $cat->category }}
                                </option>
                                @endforeach
                        </select>
                    <button type="submit">Submit</button>
                </form>
              </div>
            </div>
          </div>

          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>

    <script>
        let btnShow = document.querySelector('button');
        let input = document.querySelector('button').value;
        //let output = document.getElementById('h1');

        input.addEventListener('keyup', () => {
            if(input ==  0) btnShow.disabled = true
            else btnShow.disabled = false;
        });

        function sendData(id, name){
            document.getElementById('modal-id').value = id;
            document.getElementById('modal-name').innerHTML = name;
        }



    </script>
@endsection
