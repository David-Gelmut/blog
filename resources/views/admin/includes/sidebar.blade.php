<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <div class="m-2">
            <a href="{{route('admin.index')}}" class="brand-link">
                <i class="fa fa-home" aria-hidden="true"></i></a>
            </a>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>Пользователи</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                    <p>Посты</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <p>Категории</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.tag.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-tags"></i>
                    <p>Тэги</p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
