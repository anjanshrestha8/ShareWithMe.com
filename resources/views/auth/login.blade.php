@extends('layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('login') }}" method="post">
                @csrf()
                <h3 class="text-center text-success">Login</h3>


                <div class="form-group mt-3">
                    <label for="email" class="text-body">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('emails')
                        <span class=" d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-body">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <span class=" d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remember-me" class="text-body"></label><br>
                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
                </div>
                <div class="text-right mt-2">
                    <a href="/register" class="text-body"><button class="btn btn-primary center">Register</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
