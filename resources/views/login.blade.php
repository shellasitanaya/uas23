@extends('template.logintemplate')

@section('style')
    <style>
        .title {
            display: flex;
            justify-content: center;
            background-color: black;
            color: white;
            padding: 10px;

        }

        .login-btn {
            background-color: black;
            color: white;
            width: 100%;
        }

        .login-btn:hover {
            background-color: rgb(77, 73, 73);
            color: white;

        }

        .container {
            padding: 20px;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid vh-100">
        <div class="position-absolute top-50 start-50 translate-middle border col-6">
            <h1 class="text-center bg-dark col-12 text-light p-2">WELCOME!</h1>
            <form method="POST" action="{{route('loginn')}}">
                @csrf
                <div class="p-3">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="login-btn btn mb-3">Login</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection
