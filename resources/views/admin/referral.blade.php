@include('partials.header')


<div class="bg-slate-100 font-sans">

<div class="min-h-screen flex">
    
@include('partials.navAdmin')

       {{-- MAIN CONTENT --}}
    <main class="flex-1 min-w-0 p-6 lg:p-8">

        {{-- PAGE HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">
                    Referral Management
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Monitor and track referrals made to partner agencies.
                </p>
            </div>

            <span class="text-sm text-slate-500">
                Administration Panel
            </span>
        </div>

        {{-- SUMMARY CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

            {{-- Total Referrals --}}
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Total Referrals</p>
                <h2 class="text-3xl font-extrabold text-slate-800 mt-2">86</h2>
                <p class="text-xs text-slate-400 mt-2">All recorded referrals</p>
            </div>

            {{-- Pending --}}
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Pending</p>
                <h2 class="text-3xl font-extrabold text-amber-600 mt-2">15</h2>
                <p class="text-xs text-slate-400 mt-2">Awaiting response</p>
            </div>

            {{-- In Progress --}}
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">In Progress</p>
                <h2 class="text-3xl font-extrabold text-blue-600 mt-2">24</h2>
                <p class="text-xs text-slate-400 mt-2">Being processed</p>
            </div>

            {{-- Completed --}}
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Completed</p>
                <h2 class="text-3xl font-extrabold text-green-600 mt-2">47</h2>
                <p class="text-xs text-slate-400 mt-2">Successfully completed</p>
            </div>

        </div>

        {{-- REFERRAL RECORDS --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

            {{-- TABLE HEADER --}}
            <div class="p-6 border-b border-slate-200">

                <h2 class="text-lg font-bold text-slate-800">
                    Referral Records
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    View and monitor referrals and their current progress.
                </p>

                {{-- SEARCH AND FILTER --}}
                <form method="GET" action="{{ url('/admin/referral') }}"
                    class="flex flex-col md:flex-row gap-3 mt-5">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search referral ID, case ID, or agency..."
                        class="flex-1 border border-slate-300 rounded-lg px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-blue-500">

                    <select name="status"
                        class="border border-slate-300 rounded-lg px-4 py-2.5 text-sm">

                        <option value="">All Status</option>
                        <option value="Pending" @selected(request('status') == 'Pending')>Pending</option>
                        <option value="In Progress" @selected(request('status') == 'In Progress')>In Progress</option>
                        <option value="Completed" @selected(request('status') == 'Completed')>Completed</option>
                        <option value="Declined" @selected(request('status') == 'Declined')>Declined</option>

                    </select>

                    <button type="submit"
                        class="bg-blue-950 text-white px-6 py-2.5 rounded-lg text-sm hover:bg-blue-900 transition">
                        Search
                    </button>

                </form>

            </div>

            {{-- REFERRAL TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">Referral ID</th>
                            <th class="px-6 py-4">Case ID</th>
                            <th class="px-6 py-4">Receiving Agency</th>
                            <th class="px-6 py-4">Referral Date</th>
                            <th class="px-6 py-4">Social Worker</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @php
                            $referrals = [
                                [
                                    'id' => 'REF-001',
                                    'case' => 'CASE-001',
                                    'agency' => 'Municipal Health Office',
                                    'date' => 'Nov 10, 2026',
                                    'worker' => 'Social Worker 1',
                                    'status' => 'In Progress'
                                ],
                                [
                                    'id' => 'REF-002',
                                    'case' => 'CASE-002',
                                    'agency' => 'DSWD',
                                    'date' => 'Nov 12, 2026',
                                    'worker' => 'Social Worker 2',
                                    'status' => 'Pending'
                                ],
                                [
                                    'id' => 'REF-003',
                                    'case' => 'CASE-003',
                                    'agency' => 'Municipal Health Office',
                                    'date' => 'Nov 15, 2026',
                                    'worker' => 'Social Worker 1',
                                    'status' => 'Completed'
                                ],
                                [
                                    'id' => 'REF-004',
                                    'case' => 'CASE-004',
                                    'agency' => 'PNP Women and Children Protection Desk',
                                    'date' => 'Nov 18, 2026',
                                    'worker' => 'Social Worker 2',
                                    'status' => 'Declined'
                                ],
                            ];
                        @endphp

                        @foreach($referrals as $referral)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4 font-semibold text-blue-950">
                                    {{ $referral['id'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-700">
                                    {{ $referral['case'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $referral['agency'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $referral['date'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $referral['worker'] }}
                                </td>

                                <td class="px-6 py-4">

                                    @if($referral['status'] == 'Pending')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                            Pending
                                        </span>

                                    @elseif($referral['status'] == 'In Progress')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            In Progress
                                        </span>

                                    @elseif($referral['status'] == 'Completed')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                            Completed
                                        </span>

                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            Declined
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4 text-center">
                                    <button type="button"
                                        onclick="alert('Referral details will be connected to the database in the next development stage.')"
                                        class="text-blue-700 font-semibold hover:text-blue-900">
                                        View Details
                                    </button>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- TABLE FOOTER --}}
            <div class="px-6 py-4 border-t border-slate-200 flex justify-between items-center">

                <p class="text-xs text-slate-500">
                    Showing 4 sample referral records
                </p>

                <div class="flex gap-2">
                    <button type="button"
                        class="px-3 py-2 text-xs border rounded-lg text-slate-400">
                        Previous
                    </button>

                    <button type="button"
                        class="px-3 py-2 text-xs bg-blue-950 text-white rounded-lg">
                        1
                    </button>

                    <button type="button"
                        class="px-3 py-2 text-xs border rounded-lg text-slate-400">
                        Next
                    </button>
                </div>

            </div>

        </div>

        {{-- FOOTER --}}
        <p class="text-xs text-slate-400 mt-6 text-center">
            © {{ date('Y') }} MSWDO CARE | MSWDO Virac, Catanduanes
        </p>

    </main>

</div>

</div>

@include('partials.footer')