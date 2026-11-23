
<aside class="w-64 bg-blue-950 text-white flex flex-col min-h-screen">

    {{-- Logo and System Name --}}
    <div class="px-6 py-6 border-b border-blue-900">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/mswdo-logo.jpg') }}"
                 alt="MSWDO Logo"
                 class="w-12 h-12 rounded-full bg-white object-contain p-1">

            <div>
                <h1 class="font-extrabold text-lg tracking-wide">
                    MSWDO CARE
                </h1>
                <p class="text-xs text-blue-300">
                    Administration Panel
                </p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        <p class="text-xs uppercase tracking-widest text-blue-400 px-3 mb-3">
            Main Menu
        </p>

        {{-- Dashboard --}}
        <a href="/admin/dashboard"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/dashboard')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▦</span>
            Dashboard
        </a>

        {{-- User Management --}}
        <a href="/admin/userManagement"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/userManagement*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>♙</span>
            User Management
        </a>

        {{-- Case Monitoring --}}
        <a href="/admin/caseMonitoring"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/caseMonitoring*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▤</span>
            Case Monitoring
        </a>

        {{-- Case Assignment --}}
        <a href="/admin/caseAssignment"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/caseAssignment*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>⇄</span>
            Case Assignment
        </a>

        {{-- Referral Management --}}
        <a href="/admin/referral"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/referral*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>↗</span>
            Referral Management
        </a>

        {{-- Monitoring --}}
        <p class="text-xs uppercase tracking-widest text-blue-400 px-3 pt-6 mb-3">
            Monitoring
        </p>

        {{-- Reports --}}
        <a href="/admin/reports"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/reports*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▥</span>
            Reports
        </a>

        {{-- Activity Logs --}}
        <a href="/admin/activityLogs"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('admin/activityLogs*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>◷</span>
            Activity Logs
        </a>

    </nav>

    {{-- Footer --}}
    <div class="p-4 border-t border-blue-900">
        <p class="text-xs text-blue-400">
            MSWDO Virac, Catanduanes
        </p>
        <p class="text-xs text-blue-500 mt-1">
            © {{ date('Y') }} MSWDO CARE
        </p>
    </div>

</aside>
