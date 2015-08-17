<aside class="left-side sidebar-offcanvas">
      <!-- sidebar -->
      <section class="sidebar">
           <!-- Sidebar user panel -->
           <div class="user-panel">
                <div class="pull-left info">
                     <p>Hello, {{ Auth::user()->first_name }}</p>
                     <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
           </div>
           <!-- sidebar menu -->
           <ul class="sidebar-menu">
                <li class="{{ Request::is('admin', 'admin/adduser', 'admin/edituser/*') ? 'active':'' }}">
                     <a href="{{ URL::to('admin') }}">
                           <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                </li>
           </ul>
      </section><!-- /.sidebar -->
</aside>