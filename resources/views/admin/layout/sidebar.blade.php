<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">portofolioKU</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">P-KU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>
            {{-- <li class="menu-header">Datas</li> --}}
            <li class='{{ Request::is('profile') ? 'active' : '' }}'>
                <a class="nav-link " href="{{ route('profile.index') }}">
                    <i class="fas fa-magnifying-glass-chart"></i><span>Profile</span>
                </a>
            </li>
            <li class='{{ Request::is('skill') ? 'active' : '' }}'>
                <a class="nav-link " href="{{ route('skill.index') }}">
                    <i class="fas fa-magnifying-glass-chart"></i><span>Skill</span>
                </a>
            </li>
            <li class='{{ Request::is('education') ? 'active' : '' }}'>
                <a class="nav-link " href="{{ route('education.index') }}">
                    <i class="fas fa-magnifying-glass-chart"></i><span>Education</span>
                </a>
            </li>
            <li class='{{ Request::is('experience') ? 'active' : '' }}'>
                <a class="nav-link " href="{{ route('experience.index') }}">
                    <i class="fas fa-magnifying-glass-chart"></i><span>Experience</span>
                </a>
            </li>
            {{-- <li class='{{ Request::is('softskill') ? 'active' : '' }}'>
                <a class="nav-link " href="{{ route('softskill.index') }}">
                    <i class="fas fa-magnifying-glass-chart"></i><span>Softskill</span>
                </a>
            </li> --}}
            <li class='{{ Request::is('project') ? 'active' : '' }}'>
                <a class="nav-link " href="{{ route('project.index') }}">
                    <i class="fas fa-magnifying-glass-chart"></i><span>Project</span>
                </a>
            </li>

            {{-- <li class='{{ Request::is('datas') ? 'active' : '' }}'>
                <a class="nav-link" href="#">
                    <i class="fas fa-magnifying-glass-chart"></i><span>All Data</span>
                </a>
            </li> --}}
        </ul>
    </aside>
</div>
