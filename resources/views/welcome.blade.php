
@include('partials.header')

<header class="bg-white shadow-lg relative z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo and System Name -->
        <div class="flex items-center gap-4">

			<img src="{{ asset('images/lgu-virac.png') }}"
     		alt="Virac LGU logo" 
			class="w-16 h-16 object-contain">

			<img src="{{ asset('images/mswdo-logo.jpg') }}"
     		alt="MSWDO Logo" 
			class="w-16 h-16 object-contain">


            <div>
                <h1 class="text-xl font-bold text-blue-900">
                    MSWDO CARE
                </h1>
                <p class="text-xs text-gray-500">
                    Municipal Social Welfare and Development Office
                </p>
            </div>

        </div>

        <!-- Navigation -->
        <nav class="flex items-center gap-8">
            <a href="#home" class="text-gray-700 hover:text-blue-700">
                Home
            </a>

            <a href="#about" class="text-gray-700 hover:text-blue-700">
                About
            </a>

            <a href="#features" class="text-gray-700 hover:text-blue-700">
                Features
            </a>

            <a href="#contact" class="text-gray-700 hover:text-blue-700">
                Contact
            </a>

            <a href="{{ url('/login') }}"
               class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">
                Login
            </a>
        </nav>

    </div>
</header>

<main>

    <!-- Hero Section -->
    <section id="home" class="bg-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-24">

            <div class="max-w-2xl">
                <p class="text-blue-700 font-serif mb-4">
                    MUNICIPALITY OF VIRAC, CATANDUANES
                </p>

                <h2 class="text-5xl font-bold text-blue-950 leading-tight mb-6">
                    Better Case Management.
                    Stronger Social Services.
                </h2>

                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    MSWDO CARE is a centralized Case tracking and
                    Referral management system designed to support
                    the Municipal Social Welfare and Development Office
                    in managing, monitoring, and documenting social
                    welfare cases.
                </p>

                <a href="{{ url('/login') }}"
                   class="inline-block bg-blue-900 text-white px-8 py-3
                          rounded-lg font-semibold hover:bg-blue-800">
                    Access the System
                </a>
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-emerald-50">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold text-blue-950 mb-6">
                About MSWDO CARE
            </h2>

            <p class="text-gray-600 leading-relaxed text-lg">
                MSWDO CARE (Case Tracking, Assignment, Referral and
                Evaluation System) aims to provide a centralized
                platform for recording case information, monitoring
                case progress, managing referrals, and supporting
                social workers in delivering efficient social welfare
                services.
            </p>

        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-950 mb-3">
                    System Features
                </h2>
                <p class="text-gray-600">
                    Tools designed to support social welfare operations.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="bg-blue-300 p-8 rounded-xl shadow-lg relative z-10">
                    <h3 class="text-xl font-bold text-blue-900 mb-3">
                        Case Management
                    </h3>
                    <p class="text-gray-600">
                        Register, organize, and maintain client case records.
                    </p>
                </div>

                <div class="bg-blue-300 p-8 rounded-xl shadow-lg relative z-10">
                    <h3 class="text-xl font-bold text-blue-900 mb-3">
                        Case Tracking
                    </h3>
                    <p class="text-gray-600">
                        Monitor case assignments, progress, and current status.
                    </p>
                </div>

                <div class="bg-blue-300 p-8 rounded-xl shadow-lg relative z-10">
                    <h3 class="text-xl font-bold text-blue-900 mb-3">
                        Referral Management
                    </h3>
                    <p class="text-gray-600">
                        Record referrals and monitor their progress.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold text-blue-950 mb-4">
                Municipal Social Welfare and Development Office
            </h2>

            <p class="text-gray-600">
                Virac, Catanduanes, Philippines
            </p>
        </div>
    </section>

</main>


@include('partials.footer')