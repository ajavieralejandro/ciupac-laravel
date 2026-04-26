<header class="admin-topbar border-bottom bg-white px-3 py-2">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h6 class="mb-0">Panel de Administración</h6>
        </div>

        <div class="d-flex align-items-center gap-3">
            <span class="text-muted">
                {{ optional(Auth::user())->name ?? 'Invitado' }}
            </span>

            @auth
                <form method="POST" action="{{ route('logout') }}" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>
