<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        
         <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.departments.index' ? 'active' : '' }}" href="{{ route('admin.departments.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Departments</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.courses.index' ? 'active' : '' }}" href="{{ route('admin.courses.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Courses</span>
            </a>
        </li

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.subjects.index' ? 'active' : '' }}" href="{{ route('admin.subjects.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Subjects</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.students.index' ? 'active' : '' }}" href="{{ route('admin.students.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Students</span>
            </a>
        </li>
        
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
