@extends('layouts.master')


@section('title')
    Create book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href="/css/books/create.css" type='text/css' rel='stylesheet'> --}}
@stop


{{--
  BELOW COOMMENTED CODE IS WHAT WE DID IN LECTURE 6
  @section('content')
  <form method="POST" action="/books/create">
  line below has to be commented if lines 20 to 27 are uncommented
{{ csrf_field(); }}
  <input type="text" name="title">
  <input type="submit">
  <form>
@stop
--}}

@section('content')

    <h1>Add a new book</h1>

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form method="POST" action="/books/create">

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <fieldset>
            <label for='title'>Title:</label>
            <input type="text" id='title' name="title">
        </fieldset>

        <br>
        <button type="submit" class="btn btn-primary">Add book</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
    <script src="/js/books/create.js"></script>
@stop
