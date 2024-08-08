@extends('layouts.default')
@section('title', 'Admin')

@section('page-title', 'Admin')

@section('content')

<form action="{{ route('sendNewsLetter') }}" method="POST">
    @csrf
    <label for="subject">Subject:</label>
    <input class="border border-blue-950" type="text" id="subject" name="subject">

    <label for="content">Content:</label>
    <textarea id="content" name="content"></textarea>

    <button type="submit">Send Newsletter</button>
</form>


@stop