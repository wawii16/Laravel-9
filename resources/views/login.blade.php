<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body class="h-full font-poppins">

  <div class="container mx-auto">

    <div class="flex flex-wrap">
      <div class="relative w-full self-center lg:w-2/3 flex items-center justify-center ">
        <img src="https://images.unsplash.com/photo-1722648404113-b71577ddd17d?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="object-cover w-full lg:max-h-screen">
        <div class="absolute top-6 left-1/2 -translate-x-1/2">
          <h1 class="text-2xl font-bold">keyboard.me</h1>
        </div>
      </div>

      <div class="w-full lg:w-1/3 flex items-center justify-center py-10">
        <form action="{{ url('login_post') }}" method="post" class="mx-8 w-full">
          @csrf
          <div class="mb-5">
            <h1 class="text-5xl font-medium">Sign In</h1>
            <p class="mt-4"></p>
            Dont have an Account? <span><a href="/regist" class="text-blue-600 hover:underline dark:text-blue-500">Sign Up</a>
            </span>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li class="text-red-600 list-disc mb-2 text-sm font-medium">{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input name="email" value="{{ old('email') }}" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
          </div>

          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input name="password" value="{{ old('password') }}" type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
          </div>

          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>

        </form>
      </div>
    </div>
  </div>

</body>

</html>