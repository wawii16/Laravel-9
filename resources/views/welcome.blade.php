@extends('layouts.default')
@section('title', 'Admin')

@section('page-title', 'Admin')

@section('content')


<form class="max-w-sm mx-auto" action="{{ route('sendNewsLetter') }}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject:</label>
        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="text" id="subject" name="subject">
    </div>

    <div class="mb-5">
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content:</label>
        <textarea class="py-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" id="content" name="content"></textarea>
    </div>


    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg" type="submit">Send Newsletter</button>
</form>


@stop