@extends('layouts.default')


@section('$pageTitle', 'Tambah Brand')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('brands.store') }}" class="max-w-sm mx-auto" method="post" enctype="multipart/form-data">
        @csrf


        <div class="mb-5">
            <label for="store_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Toko</label>
            <input name="store_name" value="{{ old('store_name') }}" type="store_name" id="store_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
        </div>
        <div class="mb-5">
            <label for="owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner</label>
            <input name="owner" value="{{ old('owner') }}" type="owner" id="owner" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
        </div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Upload file</label>
        <input accept=".png, .jpg, .jpeg" name="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="photo" type="file">
        <div class="mt-3 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help"></div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>





    </form>
    <h2 class="mt-5 text-lg font-semibold mb-5">Daftar Toko</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-emerald-700 rounded-md">
            <thead class="text-white">
                <tr>
                    <th class="w-10 py-1 px-2 text-left text-xs sm:text-sm font-medium uppercase border-b border-neutral-800">No</th>
                    <th class="py-1 px-2 text-left text-xs sm:text-sm font-medium uppercase border-b border-neutral-800">Nama Toko</th>
                    <th class="py-1 px-2 text-left text-xs sm:text-sm font-medium uppercase border-b border-neutral-800">Owner</th>
                    <th class="py-1 px-2 text-center text-xs sm:text-sm font-medium uppercase border-b border-neutral-800">Foto</th>
                    <th class="py-1 px-2 text-center text-xs sm:text-sm font-medium uppercase border-b border-neutral-800">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-neutral-800">

                @foreach ($brands as $key => $brand)
                <tr>
                    <td class="w-10 py-1 px-2 text-xs sm:text-sm whitespace-wrap border-b border-neutral-800">{{ ++$key }}</td>
                    <td class="py-1 px-2 text-xs sm:text-sm whitespace-wrap border-b border-neutral-800">{{ $brand->store_name }}</td>
                    <td class="py-1 px-2 text-xs sm:text-sm whitespace-wrap border-b border-neutral-800">{{ $brand->owner }}</td>
                    <td class="py-1 px-2 text-xs sm:text-sm whitespace-wrap border-b border-neutral-800 text-center">
                        <img class="w-10 h-10 sm:w-20 sm:h-20 object-cover" src="{{ url('/') }}/uploads/{{ $brand->photo }}" alt="Gambar">
                    </td>
                    <td class="py-1 px-2 text-xs sm:text-sm whitespace-nowrap border-b border-neutral-800 text-center">
                        <div class="flex justify-center items-center space-x-2">
                            <a href="{{ route('brands.edit', ['brand' => $brand->id]) }}" class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold py-1 px-2 sm:py-1 sm:px-3 rounded">
                                Edit
                            </a>

                            <a href="{{ route('brands.destroy', $brand->id) }}" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 sm:py-1 sm:px-3 rounded " data-confirm-delete="true">Delete</a>


                        </div>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop