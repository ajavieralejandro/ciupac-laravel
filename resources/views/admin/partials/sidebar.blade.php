<aside class="admin-sidebar border-end">
    <div class="p-3 border-bottom">
        <h5 class="mb-0 text-white">Admin</h5>
    </div>

    <nav class="p-2">
        <a href="/home" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('home') ? 'active' : '' }}">
            Dashboard
        </a>
        <a href="/admin/users" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/users*') ? 'active' : '' }}">
            Usuarios
        </a>
        <a href="/admin/team" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/team*') ? 'active' : '' }}">
            Team
        </a>
        <a href="/admin/articles" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/articles*') ? 'active' : '' }}">
            Artículos
        </a>
        <a href="/admin/posts" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/posts*') ? 'active' : '' }}">
            Posts
        </a>
        <a href="/admin/logos" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/logos*') ? 'active' : '' }}">
            Logos
        </a>
        <a href="/admin/locations" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/locations*') ? 'active' : '' }}">
            Locations
        </a>
        <a href="/admin/asambleas" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/asambleas*') ? 'active' : '' }}">
            Asambleas
        </a>
        <a href="/admin/configuration" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/configuration*') ? 'active' : '' }}">
            Configuración
        </a>
        <a href="/admin/stations" class="nav-link rounded px-3 py-2 mb-1 {{ request()->is('admin/stations*') ? 'active' : '' }}">
            Stations
        </a>
    </nav>
</aside>
