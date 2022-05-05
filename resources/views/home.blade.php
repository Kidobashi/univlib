@extends('templates.main')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="opt">
                    <div class="card1">
                        <a href="#" style="text-decoration: none;">
                        <img class="card-img-top" style="height: 14rem; border-radius: 15px;" src="/images/reports.png" alt="Card image cap">
                            <div class="card-body">
                                <h2>REPORTS</h2>
                            </div>
                        </a>
                    </div>
        
                    <div class="card2">
                        <a href="/app" style="text-decoration: none;">
                        <img class="card-img-top" style="height: 14rem; border-radius: 15px;" src="/images/appimg.png" alt="Card image cap">
                            <div class="card-body">
                                <h2>APPLICATION</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    <nav class ="navi navbar bg-light">
                        <ul class ="nav navbar-nav">
                            <li class ="nav-item">
                                <a class ="nav-link" href="#"> Home </a>
                            </li>
                            <li class ="nav-item">
                                <a class ="nav-link" href="#"> Services </a>
                            </li>
                            <li class ="nav-item">
                                <a class ="nav-link" href="#"> Contact </a>
                            </li>
                            <li class ="nav-item">
                                <a class ="nav-link" href="#"> Blogs </a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
