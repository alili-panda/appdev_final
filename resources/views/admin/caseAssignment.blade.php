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
                    Case Assignment
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Assign registered cases to authorized social workers.
                </p>
            </div>

            <span class="text-sm text-slate-500">
                Administration Panel
            </span>
        </div>

        {{-- SUMMARY CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Total Cases</p>
                <h2 class="text-3xl font-extrabold text-slate-800 mt-2">125</h2>
                <p class="text-xs text-slate-400 mt-2">Registered cases</p>
            </div>

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Unassigned Cases</p>
                <h2 class="text-3xl font-extrabold text-amber-600 mt-2">18</h2>
                <p class="text-xs text-slate-400 mt-2">Waiting for assignment</p>
            </div>

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Assigned Cases</p>
                <h2 class="text-3xl font-extrabold text-blue-600 mt-2">95</h2>
                <p class="text-xs text-slate-400 mt-2">Assigned to social workers</p>
            </div>

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">Social Workers</p>
                <h2 class="text-3xl font-extrabold text-green-600 mt-2">12</h2>
                <p class="text-xs text-slate-400 mt-2">Registered accounts</p>
            </div>

        </div>

        {{-- ASSIGNMENT FORM --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm mb-8">

            <div class="p-6 border-b border-slate-200">
                <h2 class="text-lg font-bold text-slate-800">
                    Assign a Case
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Select a registered case and assign it to a social worker.
                </p>
            </div>

            <form action="#" method="POST" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Case Reference Number
                        </label>
                        <select name="case_id"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Select a case</option>
                            <option value="1">CASE-001 - Sample Client A</option>
                            <option value="2">CASE-002 - Sample Client B</option>
                            <option value="3">CASE-003 - Sample Client C</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Assign to Social Worker
                        </label>
                        <select name="social_worker_id"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Select a social worker</option>
                            <option value="1">Social Worker 1</option>
                            <option value="2">Social Worker 2</option>
                            <option value="3">Social Worker 3</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Assignment Date
                        </label>
                        <input type="date" name="assignment_date"
                            value="{{ date('Y-m-d') }}"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Assignment Notes
                        </label>
                        <input type="text" name="notes"
                            placeholder="Enter assignment notes (optional)"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-blue-950 hover:bg-blue-900 text-white px-6 py-3 rounded-lg text-sm font-semibold transition">
                        Assign Case
                    </button>
                </div>

            </form>

        </div>

        {{-- ASSIGNMENT RECORDS --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

            <div class="p-6 border-b border-slate-200">
                <h2 class="text-lg font-bold text-slate-800">
                    Case Assignment Records
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    View the social workers assigned to each case.
                </p>

                <form method="GET" action="{{ url('/admin/caseAssignment') }}"
                    class="flex flex-col md:flex-row gap-3 mt-5">

                    <input type="text" name="search"
                        value="{{ request('search') }}"
                        placeholder="Search case ID or social worker..."
                        class="flex-1 border border-slate-300 rounded-lg px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-blue-500">

                    <select name="status"
                        class="border border-slate-300 rounded-lg px-4 py-2.5 text-sm">
                        <option value="">All Assignments</option>
                        <option value="Assigned" @selected(request('status') == 'Assigned')>Assigned</option>
                        <option value="Unassigned" @selected(request('status') == 'Unassigned')>Unassigned</option>
                    </select>

                    <button type="submit"
                        class="bg-blue-950 text-white px-6 py-2.5 rounded-lg text-sm hover:bg-blue-900">
                        Search
                    </button>

                </form>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">Case ID</th>
                            <th class="px-6 py-4">Client Name</th>
                            <th class="px-6 py-4">Case Category</th>
                            <th class="px-6 py-4">Social Worker</th>
                            <th class="px-6 py-4">Assignment Date</th>
                            <th class="px-6 py-4">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @php
                            $assignments = [
                                [
                                    'id' => 'CASE-001',
                                    'client' => 'Sample Client A',
                                    'category' => 'Family Assistance',
                                    'worker' => 'Social Worker 1',
                                    'date' => 'Nov 10, 2026',
                                    'status' => 'Assigned'
                                ],
                                [
                                    'id' => 'CASE-002',
                                    'client' => 'Sample Client B',
                                    'category' => 'Child Welfare',
                                    'worker' => 'Social Worker 2',
                                    'date' => 'Nov 12, 2026',
                                    'status' => 'Assigned'
                                ],
                                [
                                    'id' => 'CASE-003',
                                    'client' => 'Sample Client C',
                                    'category' => 'Medical Assistance',
                                    'worker' => 'Not yet assigned',
                                    'date' => '—',
                                    'status' => 'Unassigned'
                                ],
                            ];
                        @endphp

                        @foreach($assignments as $assignment)

                            <tr class="hover:bg-slate-50">

                                <td class="px-6 py-4 font-semibold text-blue-950">
                                    {{ $assignment['id'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-700">
                                    {{ $assignment['client'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $assignment['category'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $assignment['worker'] }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $assignment['date'] }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($assignment['status'] == 'Assigned')
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                            Assigned
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                            Unassigned
                                        </span>
                                    @endif
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="p-5 border-t border-slate-200">
                <p class="text-xs text-slate-500">
                    Showing 3 sample assignment records
                </p>
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