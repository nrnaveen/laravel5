<header class="header">
  <a href="{{ URL::to('admin') }}" class="logo">Admin Admin</a>
  <!-- Sidebar toggle button-->
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="glyphicon glyphicon-user"></i><span>{{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }} <i class="caret"></i></span>
          </a>
          <ul class="dropdown-menu">
            <li class="bg-light-blue text-center padding" style="padding:5px;">
              <p>{{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}</p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ URL::to('admin/changepwd') }}" class="btn btn-default btn-flat"><i class="fa fa-gear fa-fw"></i> {{ trans("message.ChangePassword") }}</a>
              </div>
              <div class="pull-right">
                <a href="{{URL::to('admin/logout')}}" class="btn btn-default btn-flat"><i class="fa fa-sign-out fa-fw"></i> {{ trans("message.SignOut") }}</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>