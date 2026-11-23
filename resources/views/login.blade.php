
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MSWDO CARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100">

    <!-- Header -->
    <header class="bg-white shadow-lg relative z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div class="flex items-center gap-3">

				<img src="{{ asset('images/lgu-virac.png') }}"
     			alt="Virac LGU Logo" 
				class="w-16 h-16 object-contain">

                <img src="{{ asset('images/mswdo-logo.jpg') }}"
                     alt="MSWDO Logo"
                     class="w-14 h-14 object-contain">

                <div>
                    <h1 class="text-xl font-bold text-blue-900">
                        MSWDO CARE
                    </h1>
                    <p class="text-xs text-gray-500">
                        Municipal Social Welfare and Development Office
                    </p>
                </div>
            </div>

            <a href="{{ url('/') }}"
               class="text-blue-900 font-medium hover:text-blue-700">
                Back to Home
            </a>

        </div>
    </header>


    <!-- Login Section -->
    <main class="min-h-[85vh] flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8">

                <div class="text-center mb-8">

                    <img src="{{ asset('images/mswdo-logo.jpg') }}"
                         alt="MSWDO Logo"
                         class="w-20 h-20 object-contain mx-auto mb-4">

                    <h2 class="text-2xl font-bold text-blue-950">
                        Welcome Back!
                    </h2>

                    <p class="text-gray-500 text-sm mt-2">
                        Sign in to access the MSWDO CARE System.
                    </p>

                </div>


                <!-- Login Form -->
               
<!-- Login Form -->
<form action="{{ url('/login') }}" method="POST" class="space-y-5">

    @csrf

    <!-- Display Login Errors -->
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700
                    px-4 py-3 rounded-lg text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Email -->
    <div>
        <label for="email"
               class="block text-sm font-semibold text-gray-700 mb-2">
            Email Address
        </label>

        <input type="email"
               id="email"
               name="email"
               value="{{ old('email') }}"
               placeholder="Enter your email address"
               required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg
                      focus:outline-none focus:ring-2 focus:ring-blue-800
                      focus:border-blue-800">
    </div>

    <!-- Password -->
    <div>
        <label for="password"
               class="block text-sm font-semibold text-gray-700 mb-2">
            Password
        </label>

        <input type="password"
               id="password"
               name="password"
               placeholder="Enter your password"
               required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg
                      focus:outline-none focus:ring-2 focus:ring-blue-800
                      focus:border-blue-800">
    </div>

    <!-- Remember Me -->
    <div class="flex items-center justify-between">

        <label class="flex items-center gap-2 text-sm text-gray-600">
            <input type="checkbox"
                   name="remember"
                   value="1"
                   class="rounded border-gray-300 text-blue-900">
            Remember me
        </label>

    </div>

    <!-- Login Button -->
    <button type="submit"
            class="w-full bg-blue-900 text-white py-3 rounded-lg
                   font-semibold hover:bg-blue-800 transition duration-200">
        Sign In
    </button>

</form>


            </div>


            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">
                © {{ date('Y') }} MSWDO CARE
                <br>
                Municipality of Virac, Catanduanes
            </p>

        </div>

    </main>

</body>
</html>
