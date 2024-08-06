<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body class="h-full font-poppins">

  <div class="mx-auto">

    <div class="flex flex-wrap">
      <div class="bg-red-50 relative w-full self-center lg:w-2/3 flex items-center justify-center lg:h-screen">
        <img src="{{ asset('assets/Logo.jpg') }}" alt="" class="object-scale-down w-full lg:h-48 hidden lg:block">
        <div class="absolute top-6 left-1/2 -translate-x-1/2">
          <h1 class="text-2xl font-bold">keyboard.me</h1>
        </div>
      </div>

      <div class="w-full lg:w-1/3 flex items-center justify-center py-10 mt-8">
        <form action="{{  url('registration_post')  }}" method="post" class="mx-8 w-full max-w-xl">
          @csrf
          <div class="mb-5">
            <h1 class="text-5xl font-medium">Sign Up</h1>
            <p class="mt-4"></p>
            have an Account? <span><a href="/login" class="text-blue-600 hover:underline dark:text-blue-500">Sign In</a>
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
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input name="name" value="{{ old('name') }}" type="username" id="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name" required />
          </div>
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input name="email" value="{{ old('email') }}" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
          </div>
          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input name="password" value="{{ old('password') }}" type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
          </div>

          <div class="mb-5">
            <input id="terms" type="checkbox" value="" class="block border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
            <label for="terms" class="text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>

        </form>

      </div>
    </div>
  </div>

</body>

</html>