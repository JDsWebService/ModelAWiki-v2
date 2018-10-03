{{-- Closed Sidebar Bars --}}
<a id="show-sidebar" class="btn btn-sm btn-light">
    <i class="fas fa-bars"></i>
</a>
{{-- Sidebar --}}
<nav id="sidebar" class="sidebar-wrapper">

    {{-- Sidebar Content --}}
    <div class="sidebar-content">

        {{-- Branding --}}
        <div class="sidebar-brand">
            <a href="{{ route('pages.index') }}">Model A Wiki</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>

        {{-- Authentication Debug Component --}}
        @component('components.debug.auth')
        @endcomponent

        {{-- User Information --}}
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="{{ Auth::guard('admin')->user()->profile_image }}" alt="Your Profile Image">
            </div>
            <div class="user-info">
                <span class="user-name">{{ Auth::guard('admin')->user()->fullName }}</span>
                <span class="user-role">
                    @if(Auth::guard('admin')->user()->roles()->first())
                        {{ Auth::guard('admin')->user()->roles()->first()->name }}
                    @else
                        You have no role
                    @endif
                </span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>
        
        {{-- Sidebar Menu --}}
        <div class="sidebar-menu">
            <ul>
                
                {{-- Header --}}
                <li class="header-menu">
                    <span>General</span>
                </li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(
                    Gate::check('post.global', Auth::guard('admin')->user()) or 
                    Gate::check('tag.global', Auth::guard('admin')->user()) or 
                    Gate::check('category.global', Auth::guard('admin')->user())
                    )
                    {{-- Blog Dropdown --}}
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fab fa-blogger"></i>
                            <span>Blog</span>
                            {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul class="list-unstyled">
                                @can('post.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('post.index') }}">
                                            <i class="far fa-newspaper"></i>Posts
                                        </a>
                                    </li>
                                @endcan
                                @can('tag.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('tag.index') }}">
                                            <i class="fas fa-tags"></i>Tags
                                        </a>
                                    </li>
                                @endcan
                                @can('category.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('category.index') }}">
                                            <i class="fas fa-puzzle-piece"></i>Categories
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endif

                    {{-- Blog Dropdown --}}
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-comments"></i>
                            <span>Forum</span>
                            {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('admin.forum.category.index') }}">
                                        <i class="fas fa-puzzle-piece"></i>Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.forum.settings') }}">
                                        <i class="fas fa-cog"></i>Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.support.index') }}">
                                        <i class="fas fa-flag"></i>Reports
                                        @if(isset($reportCount))
                                        <span class="badge badge-pill badge-warning">
                                            {{ $reportCount }}
                                        </span>
                                        @endif
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </li>
                

                @if(
                    Gate::check('part.section.global', Auth::guard('admin')->user()) or 
                    Gate::check('part.global', Auth::guard('admin')->user())
                    )
                    {{-- Parts Dropdown --}}
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-car"></i>
                            <span>Parts</span>
                            {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul class="list-unstyled">
                                @can('part.section.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('part.section.index') }}">
                                            <i class="fas fa-puzzle-piece"></i>Sections
                                        </a>
                                    </li>
                                @endcan
                                @can('part.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('part.index') }}">
                                            <i class="fas fa-wrench"></i>Parts
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endif
                

                @if(
                    Gate::check('admin.global', Auth::guard('admin')->user()) or 
                    Gate::check('user.global', Auth::guard('admin')->user())
                    )
                    {{-- Users Dropdown --}}
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                            {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul class="list-unstyled">
                                @can('admin.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('admin.role.index') }}">
                                            <i class="fas fa-id-badge"></i>Roles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.permission.index') }}">
                                            <i class="fas fa-lock"></i>Permissions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.manage.index') }}">
                                            <i class="fas fa-user-shield"></i>Admin Management
                                        </a>
                                    </li>
                                @endcan
                                @can('user.global', Auth::guard('admin')->user())
                                    <li>
                                        <a href="{{ route('user.manage.index') }}">
                                            <i class="fas fa-users-cog"></i>User Management
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endif
                

                @if(Gate::check('admin.global', Auth::guard('admin')->user()))
                    {{-- Users Dropdown --}}
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-cog"></i>
                            <span>Site Settings</span>
                            {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('admin.site.homepage.index') }}">
                                        <i class="fas fa-home"></i>Homepage
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.site.about.edit') }}">
                                        <i class="fas fa-info-circle"></i>About Page
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.site.social-links.index') }}">
                                        <i class="fab fa-facebook"></i>Social Media Links
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.site.contact.edit') }}">
                                        <i class="fas fa-envelope"></i>Contact Page
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.site.setting.edit') }}">
                                        <i class="fas fa-cog"></i>ToS & Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-wrench"></i>Maintenance
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                
                {{-- Header --}}
                <li class="header-menu">
                    <span>Help</span>
                </li>
                {{-- Menu Item w/o Dropdown --}}
                <li>
                    <a href="#">
                        <i class="far fa-question-circle"></i>
                        <span>Guides</span>
                        <span class="badge badge-pill badge-primary">Coming Soon!</span>
                    </a>
                </li>
                
            </ul>
        </div> <!-- ./sidebar-menu  -->
        
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        
        {{--
        <div class="dropdown">
            
            <a href="#" class="" id="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>

            <div class="dropdown-menu messages" aria-labelledby="test">
                <div class="messages-header">
                    <i class="fa fa-envelope"></i>
                    Messages
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <img src="assets/img/user.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                        </div>
                    </div>

                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#">View all messages</a>

            </div>
        </div>
        --}}
        
        {{-- Admin Settings --}}
        <div class="dropdown">
            <a href="#" class="" id="adminUserSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
                {{-- <span class="badge-sonar"></span> --}}
            </a>
            <div class="dropdown-menu" aria-labelledby="adminUserSettings">
                {{-- <span class="badge badge-pill badge-primary">Coming Soon!</span> --}}
                <a class="dropdown-item" href="{{ route('admin.profile.self') }}">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.profile.social-links.index') }}">
                    <i class="fas fa-share-alt-square"></i> My Social Media
                </a>
                <a class="dropdown-item" href="{{ route('admin.profile.settings') }}">
                    <i class="fas fa-user-cog"></i> My Settings
                </a>
            </div>
        </div>

        {{-- Logout --}}
        <div>
            <a href="#" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </div>

    </div> <!-- /.sidebar-footer -->

</nav>