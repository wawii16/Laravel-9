@extends('layouts.default')

@section('content')

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <form action="{{ route('market.update', $market->id) }}" class="max-w-sm mx-auto" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="mb-5">
            <label for="store_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Toko</label>
            <input name="store_name" value="{{ old('store_name', $market->store_name) }}" type="store_name" id="store_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
            <label for="owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner</label>
            <input name="owner" value="{{ old('owner', $market->owner) }}" type="owner" id="owner" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        <a href="/regist">Dont have account? Register</a>


        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Upload file</label>
        <input accept=".png, .jpg, .jpeg" name="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="photo" type="file">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>
    </form>


</div>

@stop