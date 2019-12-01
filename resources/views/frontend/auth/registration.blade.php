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

        @if (session()->has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session('success') }}</li>
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
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" class="form-control" id="photo" placeholder="Photo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div><!-- /.blog-main -->
@endsection
