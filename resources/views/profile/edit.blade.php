@extends('layouts.default')

@section('$pageTitle', 'Edit Profile')


@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    @if (session('success'))
    <div class="alert alert-success">
        <p class="text-green-600 list-disc mb-2 text-sm font-medium">{{ session('success') }}</p>
    </div>
    @endif


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-red-600 list-disc mb-2 text-sm font-medium">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="mt-4 mx-8">
        <div class="flex bg-gray-300 px-4 py-10 rounded-lg">
            <div class="mx-auto">
                <div class="relative lg:h-40 lg:w-40 h-20 w-20 bg-slate-200 rounded-full">
                    <img id="previewImage" class="lg:h-40 lg:w-40 h-20 w-20 rounded-full object-cover" src="{{ asset('uploads/' . $user->photo) }}" alt="">
                    <label for="photo" class="cursor-pointer"><svg class="lg:h-14 lg:w-14 absolute right-0 bottom-0 h-7 w-7" width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.25" y="0.75" width="28.5" height="28.5" rx="14.25" fill="#141718" />
                            <rect x="1.25" y="0.75" width="28.5" height="28.5" rx="14.25" stroke="white" stroke-width="1.5" />
                            <path d="M11.7508 10.7226C11.5976 10.9524 11.6597 11.2628 11.8895 11.416C12.1192 11.5692 12.4297 11.5071 12.5829 11.2774L11.7508 10.7226ZM13.1043 9.59373L13.5204 9.87108V9.87108L13.1043 9.59373ZM17.896 9.59373L18.312 9.31638L17.896 9.59373ZM18.4175 11.2774C18.5706 11.5071 18.8811 11.5692 19.1108 11.416C19.3406 11.2628 19.4027 10.9524 19.2495 10.7226L18.4175 11.2774ZM17.0002 16C17.0002 16.8284 16.3286 17.5 15.5002 17.5V18.5C16.8809 18.5 18.0002 17.3807 18.0002 16H17.0002ZM15.5002 17.5C14.6717 17.5 14.0002 16.8284 14.0002 16H13.0002C13.0002 17.3807 14.1195 18.5 15.5002 18.5V17.5ZM14.0002 16C14.0002 15.1716 14.6717 14.5 15.5002 14.5V13.5C14.1195 13.5 13.0002 14.6193 13.0002 16H14.0002ZM15.5002 14.5C16.3286 14.5 17.0002 15.1716 17.0002 16H18.0002C18.0002 14.6193 16.8809 13.5 15.5002 13.5V14.5ZM12.5829 11.2774L13.5204 9.87108L12.6883 9.31638L11.7508 10.7226L12.5829 11.2774ZM14.2137 9.5H16.7866V8.5H14.2137V9.5ZM17.48 9.87108L18.4175 11.2774L19.2495 10.7226L18.312 9.31638L17.48 9.87108ZM16.7866 9.5C17.0652 9.5 17.3254 9.63925 17.48 9.87108L18.312 9.31638C17.972 8.80635 17.3996 8.5 16.7866 8.5V9.5ZM13.5204 9.87108C13.6749 9.63925 13.9351 9.5 14.2137 9.5V8.5C13.6008 8.5 13.0283 8.80635 12.6883 9.31638L13.5204 9.87108ZM11.5002 11.5H19.5002V10.5H11.5002V11.5ZM21.6668 13.6667V18.3333H22.6668V13.6667H21.6668ZM19.5002 20.5H11.5002V21.5H19.5002V20.5ZM9.3335 18.3333V13.6667H8.3335V18.3333H9.3335ZM11.5002 20.5C10.3035 20.5 9.3335 19.53 9.3335 18.3333H8.3335C8.3335 20.0822 9.75126 21.5 11.5002 21.5V20.5ZM21.6668 18.3333C21.6668 19.53 20.6968 20.5 19.5002 20.5V21.5C21.2491 21.5 22.6668 20.0822 22.6668 18.3333H21.6668ZM19.5002 11.5C20.6968 11.5 21.6668 12.47 21.6668 13.6667H22.6668C22.6668 11.9178 21.2491 10.5 19.5002 10.5V11.5ZM11.5002 10.5C9.75126 10.5 8.3335 11.9178 8.3335 13.6667H9.3335C9.3335 12.47 10.3035 11.5 11.5002 11.5V10.5Z" fill="#FEFEFE" />
                        </svg></label>
                </div>
                <h1 class="text-center">{{ $user->name }}</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group flex flex-col my-6">
                <label class="mb-3 font-semibold" for="name">Name</label>
                <input type="text" name="name" class="form-control border border-slate-400 rounded-xl px-4 py-2" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group flex flex-col my-6">
                <label class="mb-3 font-semibold" for="email">Email</label>
                <input type="email" name="email" class="form-control border border-slate-400 rounded-xl px-4 py-2" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group flex flex-col my-6">
                <label for="birth_date" class="mb-3 font-semibold">Tanggal Lahir</label>
                <input name="birth_date" value="{{ old('birth_date', $user->birth_date) }}" type="date" id="birth_date" class="form-control border border-slate-400 rounded-xl px-4 py-2" placeholder="" required />
            </div>

            <div class="form-group flex flex-col my-6">
                <!-- Hidden file input element -->
                <input accept=".png, .jpg, .jpeg" name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" type="file" style="display: none;" onchange="previewImage(event)">
            </div>


            <button type="submit" class="bg-gray-900 text-white px-14 py-3 rounded-xl">Save Changes</button>
        </form>
    </div>




</div>
<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection