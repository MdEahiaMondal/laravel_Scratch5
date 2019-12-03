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
            Registration  Form
        </h3>
        <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"  class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" value="12345678" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation"  value="12345678" class="form-control" id="password_confirmation" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="avatar">Photo</label>
                <input type="file" name="avatar" class="form-control" id="avatar" placeholder="Photo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div><!-- /.blog-main -->
@endsection
