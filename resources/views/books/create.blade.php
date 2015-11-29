@extends('layouts.master')

@section('title')
    Create Book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href="/css/books/create.css" type='text/css' rel='stylesheet'> --}}
@stop



@section('content')

    <h1>Add a new book</h1>

    @include('errors') 

    <form method='POST' action='/books/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{ old('title','Green Eggs & Ham') }}'
            >
        </div>

        <div class='form-group'>
            <label for='title'>* Author:</label>
            <input
                type='text'
                id='author'
                name="author"
                value='{{ old('author','Dr. Seuss') }}'
            >
        </div>

        <div class='form-group'>
            <label for='title'>* Cover (URL):</label>
            <input
                type='text'
                id='cover'
                name="cover"
                value='{{ old('cover','http://prodimage.images-bn.com/pimages/9780394800165_p0_v4_s118x184.jpg') }}'
                >
        </div>

        <div class='form-group'>
            <label for='Published'>Published (YYYY):</label>
            <input
                type='text'
                id='published'
                name="published"
                value='{{ old('published','1960') }}'
                >
        </div>

        <div class='form-group'>
            <label for='title'>* URL To purchase this book:</label>
            <input
                type='text'
                id='purchase_link'
                name='purchase_link'
                value='{{ old('purchase_link','http://www.barnesandnoble.com/w/green-eggs-and-ham-dr-seuss/1100170349?ean=9780394800165') }}'
                >
        </div>

        <button type="submit" class="btn btn-primary">Add book</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/books/create.js"></script> --}}
@stop
