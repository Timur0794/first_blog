<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('user.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-house-user"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li><li class="nav-item">
                <a href="{{route('user.like.index')}}" class="nav-link">
                    <i class="fas fa-heart"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.comment.index')}}" class="nav-link">
                    <i class="fas fa-comment"></i>
                    <p>
                        Комментарии
                    </p>
                </a>
            </li>


        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
