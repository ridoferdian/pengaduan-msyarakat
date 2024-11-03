<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEKAT | Forgot Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <div class="text-center mb-6">
            <a href="{{ route('login') }}" class="text-3xl font-bold text-blue-600">FORGOT <span
                    class="text-gray-800">PASSWORD</span></a>
        </div>
        <p class="text-center text-gray-600 mb-4">Masukkan E-Mail kamu yang terdaftar</p>

        <form action="{{ route('forgot_password-act') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <div class="flex items-center border rounded-md">
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border-none outline-none"
                        placeholder="Email">
                    <div class="p-2 bg-gray-200 rounded-r-md">
                        <span class="fas fa-envelope text-gray-500"></span>
                    </div>
                </div>
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit"
                class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none">Submit</button>
        </form>
    </div>

    <!-- jQuery and SweetAlert for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif
</body>

</html>
