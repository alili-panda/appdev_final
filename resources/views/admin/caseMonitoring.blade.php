@include('partials.header')


<div class="bg-slate-100 font-sans">

<div class="min-h-screen flex">
    
@include('partials.navAdmin')

    <!-- MAIN CONTENT -->
    <main class="flex-1 min-w-0">

        <!-- TOP HEADER -->
        <header class="bg-white border-b border-slate-200 px-8 py-5 flex items-center justify-between">

            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    Case Monitoring
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Welcome to the MSWDO CARE administration panel.
                </p>
            </div>

            <div class="flex items-center gap-4">

                <div class="text-right hidden sm:block">
                    <p class="font-semibold text-sm text-slate-800">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs text-slate-500">
                        System Administrator
                    </p>
                </div>

                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-900
                            flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-sm font-semibold text-red-600 hover:text-red-800">
                        Logout
                    </button>
                </form>

            </div>
        </header>


        <!-- DASHBOARD CONTENT -->
        <div class="p-8">

            <!-- PAGE INTRODUCTION -->
            <div class="mb-8">
                <h1 class="text-2xl font-extrabold text-blue-950">
                    Good day, Administrator!
                </h1>
                <p class="text-slate-500 mt-1">
                    Here's an overview of case management and system activities.
                </p>
            </div>

            <!-- SYSTEM INFORMATION -->
            <div class="mt-8 bg-blue-950 rounded-xl p-6 text-white">
                <h3 class="font-bold text-lg">
                    MSWDO CARE
                </h3>
                <p class="text-sm text-blue-200 mt-2 max-w-2xl">
                    Centralized Case Tracking, Assignment, Referral and
                    Evaluation System for the Municipal Social Welfare
                    and Development Office of Virac, Catanduanes.
                </p>
            </div>

        </div>
    </main>

</div>

</div>

@include('partials.footer')