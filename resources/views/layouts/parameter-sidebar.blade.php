<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3 control-sidebar-content">
        @can('Afficher rôles')
        <div class="param-item">
            <a class="param-link {{ request()->routeIs('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                Gestion des rôles
            </a>
        </div>
        @endcan
    </div>
</aside>

<style>
    .param-item {
        border-radius: 4px;
    }
    .param-item:hover {
        background-color: rgba(255,255,255,.1);
    }
    .param-link {
        display: block;
        padding: 5px 10px;
    }
    .param-link.active {
        background-color: #007bff;
        color: #FFF;
        border-radius: 4px;
    }
</style>