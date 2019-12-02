@extends('frontend.master.master')

@section('title', 'Home')

@section('slider')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
@endsection



@section('mainContent')
    <div class="col-md-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title">{{ auth()->user()->name }}</h2>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">SI</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Satus</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $key => $post)
                    <tr>
                        <th scope="row">{{$key +1 }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>

                            @if( $post->status == 'draft')
                                <a class="badge badge-secondary" href="#0">Unactive</a>
                            @else
                                <a class="badge badge-primary" href="#0">Active</a>
                            @endif

                        </td>
                        <td width="100">
                            <a class="btn btn-primary" href="#0">Details</a>
                            <a class="btn btn-warning" href="#0">Edit</a>
                            <a class="btn btn-danger" href="#0">Delete</a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

            {{ $posts->links() }}


        </div><!-- /.blog-post -->


    </div><!-- /.blog-main -->
@endsection


@section('sidebar')
    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>

        <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
            </ol>
        </div>

        <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ol>
        </div>
    </aside><!-- /.blog-sidebar -->
@endsection

