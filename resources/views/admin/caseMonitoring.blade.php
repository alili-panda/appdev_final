@include('partials.header')


<div class="bg-slate-100 font-sans">

<div class="min-h-screen flex">
    
@include('partials.navAdmin')

    {{-- MAIN CONTENT --}}
    <main class="flex-1 min-w-0 p-6 lg:p-8">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">
                    Case Monitoring
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Monitor and track the progress of all registered cases.
                </p>
            </div>

            <div class="text-sm text-slate-500">
                Administration Panel
            </div>

        </div>

        {{-- SUMMARY CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4 mb-8">

            {{-- Total Cases --}}
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">Total Cases</p>
                <h2 class="text-3xl font-extrabold text-slate-800 mt-2">125</h2>
                <p class="text-xs text-slate-400 mt-2">All registered cases</p>
            </div>

            {{-- Pending --}}
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">Pending</p>
                <h2 class="text-3xl font-extrabold text-amber-600 mt-2">18</h2>
                <p class="text-xs text-slate-400 mt-2">Awaiting action</p>
            </div>

            {{-- Ongoing --}}
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">Ongoing</p>
                <h2 class="text-3xl font-extrabold text-blue-600 mt-2">72</h2>
                <p class="text-xs text-slate-400 mt-2">Currently being handled</p>
            </div>

            {{-- Completed --}}
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">Completed</p>
                <h2 class="text-3xl font-extrabold text-green-600 mt-2">35</h2>
                <p class="text-xs text-slate-400 mt-2">Finished cases</p>
            </div>

            {{-- Referred --}}
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">Referred</p>
                <h2 class="text-3xl font-extrabold text-purple-600 mt-2">12</h2>
                <p class="text-xs text-slate-400 mt-2">Referred cases</p>
            </div>

        </div>

        {{-- CASE MONITORING TABLE --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            {{-- TABLE HEADER --}}
            <div class="p-6 border-b border-slate-200">

                <h2 class="text-lg font-bold text-slate-800">
                    Registered Case Records
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    View and monitor the current status of cases.
                </p>

                {{-- SEARCH AND FILTER --}}
                <form method="GET" action="{{ url('/admin/caseMonitoring') }}"
                      class="flex flex-col md:flex-row gap-3 mt-5">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search case ID or client name..."
                        class="flex-1 border border-slate-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">

                    <select name="status"
                        class="border border-slate-300 rounded-lg px-4 py-2.5 text-sm">
                        <option value="">All Status</option>
                        <option value="Pending" @selected(request('status') == 'Pending')>Pending</option>
                        <option value="Ongoing" @selected(request('status') == 'Ongoing')>Ongoing</option>
                        <option value="Completed" @selected(request('status') == 'Completed')>Completed</option>
                        <option value="Referred" @selected(request('status') == 'Referred')>Referred</option>
                    </select>

                    <button type="submit"
                        class="bg-blue-950 text-white px-6 py-2.5 rounded-lg text-sm hover:bg-blue-900 transition">
                        Search
                    </button>

                </form>

            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">Case ID</th>
                            <th class="px-6 py-4">Client Name</th>
                            <th class="px-6 py-4">Case Category</th>
                            <th class="px-6 py-4">Assigned Social Worker</th>
                            <th class="px-6 py-4">Date Received</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @php
                            $cases = [
                                [
                                    'id' => 'CASE-001',
                                    'client' => 'Sample Client A',
                                    'category' => 'Family Assistance',
                                    'worker' => 'Social Worker 1',
                                    'date' => 'Nov 10, 2026',
                                    'status' => 'Ongoing'
                                ],
                                [
                                    'id' => 'CASE-002',
                                    'client' => 'Sample Client B',
                                    'category' => 'Child Welfare',
                                    'worker' => 'Social Worker 2',
                                    'date' => 'Nov 12, 2026',
                                    'status' => 'Pending'
                                ],
                                [
                                    'id' => 'CASE-003',
                                    'client' => 'Sample Client C',
                                    'category' => 'Financial Assistance',
                                    'worker' => 'Social Worker 1',
                                    'date' => 'Nov 15, 2026',
                                    'status' => 'Completed'
                                ],
                                [
                                    'id' => 'CASE-004',
                                    'client' => 'Sample Client D',
                                    'category' => 'Medical Assistance',
                                    'worker' => 'Social Worker 2',
                                    'date' => 'Nov 18, 2026',
                                    'status' => 'Referred'
                                ],
                            ];
                        @endphp

                        @foreach($cases as $case)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4 font-semibold text-blue-950">
                                    {{ $case['id'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-700">
                                    {{ $case['client'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $case['category'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $case['worker'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $case['date'] }}
                                </td>

                                <td class="px-6 py-4">

                                    @if($case['status'] == 'Pending')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                            Pending
                                        </span>

                                    @elseif($case['status'] == 'Ongoing')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            Ongoing
                                        </span>

                                    @elseif($case['status'] == 'Completed')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                            Completed
                                        </span>

                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                                            Referred
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4 text-center">

                                    <button type="button"
                                        onclick="alert('Case details will be connected to the database in the next development stage.')"
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
                    Showing 4 sample records
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

        <p class="text-xs text-slate-400 mt-6 text-center">
            © {{ date('Y') }} MSWDO CARE | MSWDO Virac, Catanduanes
        </p>

    </main>

</div>

</div>

@include('partials.footer')