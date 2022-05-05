@extends('layouts.master')
<link rel="stylesheet" href="/css/mainlib.css">
@section('title', 'Home')
@section('content')
<div class="header">
    <div class="logo">
        <img src="/images/logo.png" alt="Logo">
    </div>
    <div class="logout">
        <a href="/home"><button style="font-weight:bold;">DASHBOARD</button></a>
    </div>
    <h1>Welcome to the CMU MAIN LIBRARY!</h1>
    <div class="row">
    <div class="glass-panel1">
            <div class="card ace">
                <a href="/student" style="text-decoration: none;">
                <img class="card-img-top" style="height: 14rem;" src="/images/student.png" alt="Card image cap">
                    <div class="card-body">
                        <input type="text" value="Student" hidden>
                        <h2>Enter as Student</h2>
                    </div>
                </a>    
            </div>

            <div class="card deusce" style="height: 25rem">
                <a href="/visitor" style="text-decoration: none;">
                <img class="card-img-top" style="height: 14rem;" src="/images/unknown.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h2>Enter as Visitor</h2>
                    </div>
                </a>
            </div>

            <div class="card trey">
                <a href="/faculty" style="text-decoration: none;">
                <img class="card-img-top" style="height: 14rem;" src="/images/facultys.png" alt="Card image cap">
                    <div class="card-body">
                        <h2>Enter as Faculty</h2>
                    </div>
                </a>
            </div>
                </div>
            <div class="">
        </div>
    </div>
</div>
</div>
@endsection