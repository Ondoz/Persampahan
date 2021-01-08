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
                <a href="{{route('sampah')}}">
                    <i class="fa fa-trash"></i> <span>Sampah</span>
                </a>
            </li>
            <li class="{{request()->is('admin/nasabah') ? 'active' : ''}}">
                <a href="{{route('nasabah')}}">
                    <i class="fa fa-laptop"></i> <span>Nasabah</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
