@extends('frontend.master.master')

@section('title', 'Home')



@section('mainContent')

    <div class="col-md-6 offset-3 blog-main">
        <br>
        <br>
        <br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-{{ session('type') }}">
                <ul>
                    <li>{{ session('message') }}</li>
                </ul>
            </div>
        @endif




        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Login  Form
        </h3>
        <form action="{{ route('login.check') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div><!-- /.blog-main -->
@endsection
