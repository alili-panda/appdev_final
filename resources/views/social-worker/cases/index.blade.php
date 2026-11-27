@include('partials.header')

<div class="bg-slate-100 font-sans">

<div class="min-h-screen flex">

@include('partials.navSocialWorker')

    <!-- MAIN CONTENT -->
    <main class="flex-1 min-w-0">

        <!-- HEADER -->
        <header class="bg-white border-b border-slate-200 px-8 py-5 flex justify-between items-center">

            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    My Cases
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Manage your assigned cases and client services.
                </p>
            </div>

            <div class="flex items-center gap-4">

                <a href="{{ route('social-worker.cases.create') }}" class="px-4 py-2 rounded-lg bg-blue-700 text-white font-semibold">+ Add Case</a>
                <div class="text-right">
                    <p class="font-semibold text-sm text-slate-800">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs text-slate-500">Social Worker</p>
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

        <div class="p-8">

            <!-- WELCOME -->
            <div class="mb-8">
                <h1 class="text-2xl font-extrabold text-blue-950">
                    Good day, {{ auth()->user()->name }}!
                </h1>
                <p class="text-slate-500 mt-1">
                    Here's your current casework overview.
                </p>
            </div>

            <!-- MAIN LOWER CONTENT -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8">

                <!-- MY RECENT CASES -->
                <div id="cases" class="xl:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200">

                    <div class="px-6 py-5 border-b border-slate-200 flex justify-between">
                        <div>
                            <h3 class="font-bold text-slate-800">My Recent Cases</h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Overview of your assigned case records
                            </p>
                        </div>

                        <a href="#cases" class="text-sm font-semibold text-blue-700">
                            View All
                        </a>
                    </div>

                    @if(session('success'))<p class="p-4 text-green-800" role="status">{{ session('success') }}</p>@endif
                    <div class="overflow-x-auto"><table class="w-full text-sm text-left">
                      <thead><tr><th class="p-4">Case number</th><th class="p-4">Client</th><th class="p-4">Date admitted</th></tr></thead>
                      <tbody>@forelse($cases as $case)
                        <tr class="border-t"><td class="p-4">{{ $case->case_number }}</td><td class="p-4">{{ $case->given_name }} {{ $case->last_name }}</td><td class="p-4">{{ $case->referred_admitted_date ?? '—' }}</td></tr>
                      @empty<tr><td colspan="3" class="p-10 text-center text-slate-500">No cases yet. Select Add Case to create one.</td></tr>@endforelse</tbody>
                    </table></div><div class="p-4">{{ $cases->links() }}</div>

                </div>

                <!-- QUICK ACTIONS -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200">

                    <div class="px-6 py-5 border-b border-slate-200">
                        <h3 class="font-bold text-slate-800">Quick Actions</h3>
                        <p class="text-sm text-slate-500 mt-1">
                            Frequently used functions
                        </p>
                    </div>

                    <div class="p-5 space-y-3">

                        <a href="#cases"
                           class="block p-3 rounded-lg bg-blue-50 hover:bg-blue-100">
                            <p class="font-semibold text-sm text-blue-950">
                                View Assigned Cases
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                Review your assigned clients
                            </p>
                        </a>

                        <a href="#assessment"
                           class="block p-3 rounded-lg bg-amber-50 hover:bg-amber-100">
                            <p class="font-semibold text-sm text-blue-950">
                                Conduct Assessment
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                Document client needs
                            </p>
                        </a>

                        <a href="#referrals"
                           class="block p-3 rounded-lg bg-indigo-50 hover:bg-indigo-100">
                            <p class="font-semibold text-sm text-blue-950">
                                Manage Referrals
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                Create and monitor referrals
                            </p>
                        </a>

                        <a href="#reports"
                           class="block p-3 rounded-lg bg-emerald-50 hover:bg-emerald-100">
                            <p class="font-semibold text-sm text-blue-950">
                                Generate Reports
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                Use available report templates
                            </p>
                        </a>

                    </div>
                </div>

            </div>

            <!-- WORKFLOW REMINDER -->
            <div class="mt-8 bg-blue-950 rounded-xl p-6 text-white">
                <h3 class="font-bold text-lg">Your Casework Responsibilities</h3>
                <p class="text-sm text-blue-200 mt-2">
                    Review assigned cases, document assessments, update case
                    progress, coordinate referrals, and record evaluation
                    results to maintain accurate and updated client records.
                </p>
            </div>

        </div>
    </main>

</div>

</div>
@include('partials.footer')
