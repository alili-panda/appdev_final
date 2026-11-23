
<!-- SIDEBAR -->
<aside class="w-64 bg-blue-950 text-white flex flex-col min-h-screen">

    {{-- Logo and System Name --}}
    <div class="px-6 py-6 border-b border-blue-900">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/mswdo-logo.jpg') }}"
                 alt="MSWDO Logo"
                 class="w-12 h-12 rounded-full bg-white object-contain p-1">

            <div>
                <h1 class="font-extrabold text-lg">MSWDO CARE</h1>
                <p class="text-xs text-blue-300">Social Worker Portal</p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        <p class="text-xs uppercase tracking-widest text-blue-400 px-3 mb-3">
            Workspace
        </p>

        {{-- Dashboard --}}
        <a href="/social-worker/dashboard"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('social-worker/dashboard')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▦</span> Dashboard
        </a>

        {{-- My Cases --}}
        <a href="/social-worker/myCases"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('social-worker/myCases*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▤</span> My Cases
        </a>

        {{-- Referral Management --}}
        <a href="/social-worker/referralManagement"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('social-worker/referralManagement*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>↗</span> Referral Management
        </a>

        <p class="text-xs uppercase tracking-widest text-blue-400 px-3 pt-6 mb-3">
            Records
        </p>

        {{-- Reports --}}
        <a href="/social-worker/reportManagement"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('social-worker/reportManagement*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▥</span> Reports
        </a>

        {{-- My Profile --}}
        <a href="/social-worker/myProfile"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('social-worker/myProfile*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>♙</span> My Profile
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
