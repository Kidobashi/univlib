@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

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
                            <a href="#">
                                <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
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
                                {{-- User Role Assignment --}}
                                <?php
                                $user = DB::table('users')->find(auth()->user()->id);

                                $assignment = DB::table('librarian_users')->select('category_id')
                                ->where('user_id', '=', auth()->user()->id)->first();

                                $rrAssignment = DB::table('librarian_cat')->select('category')
                                ->where('id', '=', $assignment->category_id)->first();
                                //dd($role);
                                ?>
                            </a>
                            <p class="description">
                                 <h4 class="title">{{ $role->name }} - {{ $rrAssignment->category }}</h4>
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        {{ __('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
@endsection
