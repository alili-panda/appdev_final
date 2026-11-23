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
                    Dashboard Overview
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


            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- USERS -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-500">
                            Total Users
                        </p>
                        <div class="w-11 h-11 rounded-lg bg-blue-100 text-blue-700
                                    flex items-center justify-center text-xl">
                            ♙
                        </div>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-950 mt-4">0</h3>
                    <p class="text-xs text-slate-400 mt-2">
                        Registered system accounts
                    </p>
                </div>


                <!-- CASES -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-500">
                            Total Cases
                        </p>
                        <div class="w-11 h-11 rounded-lg bg-indigo-100 text-indigo-700
                                    flex items-center justify-center text-xl">
                            ▤
                        </div>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-950 mt-4">0</h3>
                    <p class="text-xs text-slate-400 mt-2">
                        Registered case records
                    </p>
                </div>


                <!-- ASSIGNMENTS -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-500">
                            Active Assignments
                        </p>
                        <div class="w-11 h-11 rounded-lg bg-amber-100 text-amber-700
                                    flex items-center justify-center text-xl">
                            ⇄
                        </div>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-950 mt-4">0</h3>
                    <p class="text-xs text-slate-400 mt-2">
                        Cases assigned to social workers
                    </p>
                </div>


                <!-- REFERRALS -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-500">
                            Total Referrals
                        </p>
                        <div class="w-11 h-11 rounded-lg bg-emerald-100 text-emerald-700
                                    flex items-center justify-center text-xl">
                            ↗
                        </div>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-950 mt-4">0</h3>
                    <p class="text-xs text-slate-400 mt-2">
                        Recorded referral transactions
                    </p>
                </div>

            </div>


            <!-- LOWER SECTION -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8">

                <!-- RECENT CASES -->
                <div class="xl:col-span-2 bg-white rounded-xl shadow-sm
                            border border-slate-200">

                    <div class="px-6 py-5 border-b border-slate-200 flex justify-between">
                        <div>
                            <h3 class="font-bold text-slate-800">
                                Recent Case Records
                            </h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Recently registered cases
                            </p>
                        </div>
                        <a href="#cases"
                           class="text-sm font-semibold text-blue-700 hover:text-blue-900">
                            View All
                        </a>
                    </div>

                    <div class="p-6 text-center">
                        <div class="text-4xl text-slate-300 mb-3">▤</div>
                        <p class="font-semibold text-slate-600">
                            No case records available
                        </p>
                        <p class="text-sm text-slate-400 mt-1">
                            Registered cases will appear here.
                        </p>
                    </div>

                </div>


                <!-- QUICK ACTIONS -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200">

                    <div class="px-6 py-5 border-b border-slate-200">
                        <h3 class="font-bold text-slate-800">
                            Quick Actions
                        </h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Common administrative tasks
                        </p>
                    </div>

                    <div class="p-5 space-y-3">

                        <a href="#users"
                           class="flex items-center gap-3 p-3 rounded-lg
                                  bg-blue-50 hover:bg-blue-100 transition">
                            <span class="text-blue-700 text-xl">♙</span>
                            <span class="text-sm font-semibold text-blue-950">
                                Manage User Accounts
                            </span>
                        </a>

                        <a href="#cases"
                           class="flex items-center gap-3 p-3 rounded-lg
                                  bg-indigo-50 hover:bg-indigo-100 transition">
                            <span class="text-indigo-700 text-xl">▤</span>
                            <span class="text-sm font-semibold text-blue-950">
                                Monitor Cases
                            </span>
                        </a>

                        <a href="#assignments"
                           class="flex items-center gap-3 p-3 rounded-lg
                                  bg-amber-50 hover:bg-amber-100 transition">
                            <span class="text-amber-700 text-xl">⇄</span>
                            <span class="text-sm font-semibold text-blue-950">
                                Monitor Assignments
                            </span>
                        </a>

                        <a href="#reports"
                           class="flex items-center gap-3 p-3 rounded-lg
                                  bg-emerald-50 hover:bg-emerald-100 transition">
                            <span class="text-emerald-700 text-xl">▥</span>
                            <span class="text-sm font-semibold text-blue-950">
                                View Reports
                            </span>
                        </a>

                    </div>
                </div>

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