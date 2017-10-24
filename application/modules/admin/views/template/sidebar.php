<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo site_url('assets/img/user_icon.png'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Administrator</p>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
      </li>
      <li class="treeview">
        <a href="<?php echo site_url('admin/category'); ?>"><i class="fa fa-list"></i>Category</a>
      </li>
      <li class="treeview">
        <a href="<?php echo site_url('admin/post'); ?>"><i class="fa fa-copy"></i>Post</a>
      </li>
      <li class="treeview">
        <a href="<?php echo site_url('admin/user'); ?>"><i class="fa fa-group"></i>User</a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
