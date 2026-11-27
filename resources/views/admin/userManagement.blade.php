
@include('partials.header')

<div class="bg-slate-100 min-h-screen font-sans">
    <div class="min-h-screen flex">

        @include('partials.navAdmin')

        <main class="flex-1 min-w-0">

            {{-- HEADER --}}
            <header class="bg-white border-b border-slate-200 px-8 py-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">User Management</h2>
                    <p class="text-sm text-slate-500">
                        Manage administrators, workers, and client accounts.
                    </p>
                </div>

                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </header>

            <div class="p-8">

                {{-- ALERTS --}}
                @if(session('success'))
                    <div class="mb-5 rounded-lg bg-green-100 text-green-800 px-4 py-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-5 rounded-lg bg-red-100 text-red-800 px-4 py-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-5 rounded-lg bg-red-100 text-red-800 px-4 py-3">
                        <p class="font-semibold mb-2">Please correct the following errors:</p>
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- STATISTICS --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                        <p class="text-sm text-slate-500">Administrators</p>
                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ $totalAdmins }}
                        </h3>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                        <p class="text-sm text-slate-500">MSWDO Workers</p>
                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ $totalWorkers }}
                        </h3>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                        <p class="text-sm text-slate-500">Client Users</p>
                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ $totalClients }}
                        </h3>
                    </div>

                </div>

                {{-- REGISTRATION FORMS --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-8">

                    <h3 class="text-lg font-bold text-slate-800 mb-5">
                        Register New User
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        {{-- ADMIN --}}
                        <details class="border border-slate-200 rounded-lg p-4">
                            <summary class="font-semibold text-slate-800 cursor-pointer">
                                Register Administrator
                            </summary>

                            
                             <form action="{{ route('users.store') }}" method="POST" class="mt-5 space-y-4">
                                @csrf

                                <input type="hidden" name="role" value="admin">

                                <div>
                                    <label class="block text-sm font-medium mb-1">Full Name</label>
                                    <input type="text" name="name" required
                                        value="{{ old('name') }}"
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Email</label>
                                    <input type="email" name="email" required
                                        value="{{ old('email') }}"
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Password</label>
                                    <input type="password" name="password" required
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <button type="submit"
                                    class="w-full bg-slate-800 text-white rounded-lg py-2 hover:bg-slate-700">
                                    Create Administrator
                                </button>
                            </form>
                        </details>

                        {{-- WORKER --}}
                        <details class="border border-slate-200 rounded-lg p-4">
                            <summary class="font-semibold text-slate-800 cursor-pointer">
                                Register MSWDO Worker
                            </summary>

                            <form method="POST" action="{{ route('users.store') }}"
                                class="mt-5 space-y-4">
                                @csrf

                                <input type="hidden" name="role" value="social_worker">

                                <div>
                                    <label class="block text-sm font-medium mb-1">Full Name</label>
                                    <input type="text" name="name" required
                                        value="{{ old('name') }}"
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Email</label>
                                    <input type="email" name="email" required
                                        value="{{ old('email') }}"
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Password</label>
                                    <input type="password" name="password" required
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-600 text-white rounded-lg py-2 hover:bg-blue-700">
                                    Create Worker
                                </button>
                            </form>
                        </details>

                        {{-- CLIENT --}}
                        {{-- <details class="border border-slate-200 rounded-lg p-4">
                            <summary class="font-semibold text-slate-800 cursor-pointer">
                                Register Client User
                            </summary>

                            <form method="POST" action="{{ route('users.store') }}"
                                class="mt-5 space-y-4">
                                @csrf

                                <input type="hidden" name="role" value="client">

                                <div>
                                    <label class="block text-sm font-medium mb-1">Full Name</label>
                                    <input type="text" name="name" required
                                        value="{{ old('name') }}"
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Email</label>
                                    <input type="email" name="email" required
                                        value="{{ old('email') }}"
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Password</label>
                                    <input type="password" name="password" required
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required
                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                </div>

                                <button type="submit"
                                    class="w-full bg-green-600 text-white rounded-lg py-2 hover:bg-green-700">
                                    Create Client
                                </button>
                            </form>
                        </details> --}}

                    </div>
                </div>

                {{-- Role tabs use server-side filtering, including paginated records. --}}
                @php
                    $roleTabs = [
                        '' => 'All Users',
                        'admin' => 'Administrators',
                        'social_worker' => 'MSWDO Workers',
                        'client' => 'Client Users',
                    ];
                    $activeRole = array_key_exists(request('role', ''), $roleTabs)
                        ? request('role', '') : '';
                @endphp
                <nav aria-label="User categories" class="flex flex-wrap gap-2 mb-6 border-b border-slate-200 pb-4">
                    @foreach($roleTabs as $roleValue => $roleLabel)
                        <a href="{{ route('admin.userManagement', array_filter(['role' => $roleValue, 'search' => request('search')], fn ($value) => $value !== null && $value !== '')) }}"
                            @if($activeRole === $roleValue) aria-current="page" @endif
                            class="px-4 py-2 rounded-lg text-sm font-semibold {{ $activeRole === $roleValue ? 'bg-slate-800 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                            {{ $roleLabel }}
                        </a>
                    @endforeach
                </nav>
                {{-- USER TABLE --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">{{ $roleTabs[$activeRole] }}</h3>
                            <p class="text-sm text-slate-500">
                                User records retrieved from the users table.
                            </p>
                        </div>

                        <form method="GET" action="{{ route('admin.userManagement') }}"
                            class="flex flex-col sm:flex-row gap-2">

                            <input type="text" name="search"
                                value="{{ request('search') }}"
                                placeholder="Search name or email..."
                                class="border border-slate-300 rounded-lg px-3 py-2">

                            <input type="hidden" name="role" value="{{ $activeRole }}">

                            <button type="submit"
                                class="bg-slate-800 text-white rounded-lg px-4 py-2 hover:bg-slate-700">
                                Search
                            </button>

                            <a href="{{ route('admin.userManagement', $activeRole !== '' ? ['role' => $activeRole] : []) }}"
                                class="border border-slate-300 rounded-lg px-4 py-2 text-center hover:bg-slate-50">
                                Reset
                            </a>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-slate-50 text-slate-600 uppercase">
                                <tr>
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Role</th>
                                    <th class="px-4 py-3">Date Created</th>
                                    <th class="px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @forelse($users as $user)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-3">{{ $user->id }}</td>
                                        <td class="px-4 py-3 font-medium text-slate-800">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>

                                        <td class="px-4 py-3">
                                            @if($user->role === 'admin')
                                                <span class="px-2 py-1 rounded-full bg-purple-100 text-purple-700">
                                                    Administrator
                                                </span>
                                            @elseif($user->role === 'social_worker')
                                                <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700">
                                                    MSWDO Worker
                                                </span>
                                            @else
                                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-700">
                                                    Client User
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-4 py-3 text-slate-500">
                                            {{ $user->created_at?->format('M d, Y') ?? '—' }}
                                        </td>

                                        <td class="px-4 py-3">
                                            <div class="flex justify-center gap-2">

                                                {{-- EDIT --}}
                                                <details class="relative">
                                                    <summary class="cursor-pointer rounded-lg bg-blue-100 text-blue-700 px-3 py-2">
                                                        Edit
                                                    </summary>

                                                    <div class="fixed inset-0 z-40 bg-black/40 overflow-y-auto p-4">
                                                        <div class="max-w-lg mx-auto mt-10 bg-white rounded-xl shadow-lg p-6">
                                                            <div class="flex justify-between items-center mb-5">
                                                                <h3 class="font-bold text-lg">
                                                                    Edit User #{{ $user->id }}
                                                                </h3>
                                                                <span class="text-sm text-slate-500">
                                                                    Close by selecting Edit again
                                                                </span>
                                                            </div>

                                                            <form method="POST"
                                                                action="{{ route('users.update', $user) }}"
                                                                class="space-y-4">
                                                                @csrf
                                                                @method('PUT')

                                                                <div>
                                                                    <label class="block text-sm font-medium mb-1">Full Name</label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $user->name }}" required
                                                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium mb-1">Email</label>
                                                                    <input type="email" name="email"
                                                                        value="{{ $user->email }}" required
                                                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium mb-1">Role</label>
                                                                    <select name="role" required
                                                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                                                        <option value="admin" @selected($user->role === 'admin')>
                                                                            Administrator
                                                                        </option>
                                                                        <option value="worker" @selected($user->role === 'worker')>
                                                                            MSWDO Worker
                                                                        </option>
                                                                        <option value="client" @selected($user->role === 'client')>
                                                                            Client User
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium mb-1">
                                                                        New Password (optional)
                                                                    </label>
                                                                    <input type="password" name="password"
                                                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium mb-1">
                                                                        Confirm New Password
                                                                    </label>
                                                                    <input type="password" name="password_confirmation"
                                                                        class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                                                </div>

                                                                <button type="submit"
                                                                    class="w-full bg-blue-600 text-white rounded-lg py-2 hover:bg-blue-700">
                                                                    Update User
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </details>

                                                {{-- DELETE --}}
                                                @if($user->id !== auth()->id())
                                                    <form method="POST"
                                                        action="{{ route('users.destroy', $user) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="rounded-lg bg-red-100 text-red-700 px-3 py-2 hover:bg-red-200">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"
                                            class="px-4 py-8 text-center text-slate-500">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-6">
                        {{ $users->withQueryString()->links() }}
                    </div>

                </div>

            </div>
        </main>
    </div>
</div>

@include('partials.footer')

