<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <div class="m-2">
            <a href="{{route('personal.index')}}" class="brand-link">
                <i class="fa fa-home" aria-hidden="true"></i></a>

            </a>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <p>Понравившиеся посты</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.comment.index')}}" class="nav-link">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <p>Комментарии</p>
                </a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
