<div class="list-group">
    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard
    </a>
</div>

@if(
    Gate::check('post.global', Auth::guard('admin')->user()) or 
    Gate::check('tag.global', Auth::guard('admin')->user()) or 
    Gate::check('category.global', Auth::guard('admin')->user())
    )
    <h5 class="mt-3"><i class="fab fa-blogger"></i>&nbsp;&nbsp;Blog</h5>
    <div class="list-group">
        @can('post.global', Auth::guard('admin')->user())
            <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">
                <i class="far fa-newspaper"></i>&nbsp;&nbsp;Posts
            </a>
        @endcan
        
        @can('tag.global', Auth::guard('admin')->user())
            <a href="{{ route('tag.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-tags"></i>&nbsp;&nbsp;Tags
            </a>
        @endcan
        
        @can('category.global', Auth::guard('admin')->user())
            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-puzzle-piece"></i>&nbsp;&nbsp;Categories
            </a>
        @endcan
        
        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-chart-area"></i>&nbsp;&nbsp;Analytics
        </a>
    </div>
@endif

@if(
    Gate::check('part.section.global', Auth::guard('admin')->user()) or 
    Gate::check('part.global', Auth::guard('admin')->user())
    )
    <h5 class="mt-3"><i class="fas fa-car"></i>&nbsp;&nbsp;Parts</h5>
    <div class="list-group">
        @can('part.section.global', Auth::guard('admin')->user())
            <a href="{{ route('part.section.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-puzzle-piece"></i>&nbsp;&nbsp;Sections
            </a>
        @endcan
        @can('part.global', Auth::guard('admin')->user())
            <a href="{{ route('part.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-wrench"></i>&nbsp;&nbsp;Parts
            </a>
        @endcan
    </div>
@endif
@if(
    Gate::check('admin.global', Auth::guard('admin')->user()) or 
    Gate::check('user.global', Auth::guard('admin')->user())
    )
    <h5 class="mt-3"><i class="fas fa-users"></i>&nbsp;&nbsp;Users</h5>
    <div class="list-group">
        @can('admin.global', Auth::guard('admin')->user())
            <a href="{{ route('admin.role.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-id-badge"></i>&nbsp;&nbsp;Roles
            </a>

            <a href="{{ route('admin.permission.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-lock"></i>&nbsp;&nbsp;Permissions
            </a>

            <a href="{{ route('admin.manage.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-user-shield"></i>&nbsp;&nbsp;Admin Management
            </a>
        @endcan
        @can('user.global', Auth::guard('admin')->user())
            <a href="{{ route('user.manage.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-users-cog"></i>&nbsp;&nbsp;User Management
            </a>
        @endcan
    </div>
@endif

<h5 class="mt-3"><i class="fas fa-cog"></i>&nbsp;&nbsp;Site Settings</h5>
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action">
        <i class="fas fa-home"></i>&nbsp;&nbsp;Homepage
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <i class="fas fa-info"></i>&nbsp;&nbsp;About Page
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <i class="fas fa-envelope"></i>&nbsp;&nbsp;Contact Page
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <i class="fas fa-wrench"></i>&nbsp;&nbsp;Maintenance
    </a>
</div>