@extends('templates.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4" style="position: relative;">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#" style="color: black; text-decoration: none;">
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                                {{-- User Role --}}
                                <?php
                                    $user = DB::table('users')->find(auth()->user()->id);

                                    $assignedRole = DB::table('roles_user')->select('roles_id')
                                    ->where('user_id', '=', auth()->user()->id)->first();

                                    $role = DB::table('roles')->select('name')
                                    ->where('id', '=', $assignedRole->roles_id)->first();
                                    //dd($role);
                                ?>
                                {{-- Administrator Assignment --}}
                                @can('is-admin')
                                    <h4 class="title">{{ $role->name }}</h4>
                                @endcan

                                @can('is-librarian')
                                <?php
                                $user = DB::table('users')->find(auth()->user()->id);

                                $assignment = DB::table('librarian_users')->select('category_id')
                                ->where('user_id', '=', auth()->user()->id)->first();

                                $rrAssignment = DB::table('librarian_cat')->select('category')
                                ->where('id', '=', $assignment->category_id)->first();
                                //dd($role);
                                ?>
                                @endcan
                            </a>
                            <p class="description">
                                @can('is-librarian') <h4 class="title">{{ $role->name }} - {{ $rrAssignment->category }}</h4>@endcan
                            </p>
                        </div>
                    </p>
                </div>
            </div>
        </div>
     </div>
    </div>
@endsection
