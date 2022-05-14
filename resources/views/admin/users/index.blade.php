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
            <a href="">Show Librarian</a>
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href={{ route('admin.users.edit', $user->id) }} role="button">Edit</a>

                        <button type="button" class="btn btn-sm btn-danger" 
                        onclick="event.preventDefault();
                        document.getElementById('deactivate-user-form-{{ $user->id }}').submit()" value="{{$user->status}}" >
                            Deactivate
                        </button>

                        <button type="button" class="btn btn-sm btn-success" 
                        onclick="event.preventDefault();
                        document.getElementById('reactivate-user-form-{{ $user->id }}').submit()" value="{{$user->status}}" >
                            Reactivate
                        </button>

                        <form id="reactivate-user-form-{{ $user->id }}" action="{{ route('admin.users.show', $user->id) }}" method="PUT" style="display: none">
                            @csrf
                            @method("PUT")
                        </form>

                        <form id="deactivate-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          {{ $users->links() }}
    </div>

    <script>
        let btnShow = document.querySelector('button');
        let input = document.querySelector('button').value;
        //let output = document.getElementById('h1');
        
        input.addEventListener('keyup', () => {
            if(input ==  0) btnShow.disabled = true
            else btnShow.disabled = false;
        });
    </script>
@endsection