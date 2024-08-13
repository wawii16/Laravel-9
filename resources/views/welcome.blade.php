@extends('layouts.default')
@section('title', 'Admin')

@section('page-title', 'Admin')

@section('content')


<form class="max-w-sm px-4 sm:px-6 lg:px-8" action="{{ route('sendNewsLetter') }}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 ">Subject:</label>
        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="text" id="subject" name="subject">
    </div>

    <div class="mb-5">
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content:</label>
        <textarea class="py-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " id="content" name="content"></textarea>
    </div>


    <button class="px-4 py-2 bg-[#2b6afd] text-white rounded-lg hover:bg-blue-700" type="submit">Send Newsletter</button>
</form>


@stop