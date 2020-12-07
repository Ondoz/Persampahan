<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="{{request()->is('admin') ? 'active' : ''}}">
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{request()->is('admin/persampahan') ? 'active' : ''}}">
                <a href="widgets.html">
                    <i class="fa fa-dashboard"></i> <span>Persampahan</span>
                </a>
            </li>
            <li class="{{request()->is('admin/kategori') ? 'active' : ''}}">
                <a href="{{route('kategori')}}">
                    <i class="fa fa-dashboard"></i> <span>Kategori</span>
                </a>
            </li>
            <li class="{{request()->is('admin/daerah') ? 'active' : ''}}">
                <a href="{{route('daerah')}}">
                    <i class="fa fa-dashboard"></i> <span>Daerah</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
