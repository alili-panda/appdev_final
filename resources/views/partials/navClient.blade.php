
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
                <p class="text-xs text-blue-300">Client Portal</p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        <p class="text-xs uppercase tracking-widest text-blue-400 px-3 mb-3">
            Workspace
        </p>

        {{-- Dashboard --}}
        <a href="/client/dashboard"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('client/dashboard*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▦</span> Dashboard
        </a>

        {{-- My Case Status --}}
        <a href="/client/caseStatus"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('client/caseStatus*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>▤</span> My Case Status
        </a>

        {{-- Upload Documents --}}
        <a href="/client/uploadFile"
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition
           {{ request()->is('client/uploadFile*')
                ? 'bg-blue-700 text-white font-semibold shadow-md'
                : 'text-blue-100 hover:bg-blue-900' }}">
            <span>⇧</span> Upload Documents
        </a>

    </nav>

    {{-- Logout --}}
    <div class="px-4 pb-4">
        <form action="{{ url('/logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 hover:bg-red-600 hover:text-white transition">
                <span>↪</span>
                Logout
            </button>
        </form>
    </div>

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
