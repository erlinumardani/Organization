
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Organization</title>
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O</b>RG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Organization</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>

    <style>
      .detail td{
        padding:5px;
      }
    </style>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{url('organization')}}"><i class="fa fa-sitemap"></i> <span>Organization</span></a></li>
        
        
         
        

        @can('isAdmin')
        <li><a href="#"><i class="fa fa-users"></i> <span>Manage User</span></a></li>
        <li class="active"><a href="{{url('category')}}"><i class="fa fa-microchip"></i> <span>Category</span></a></li>
        <li><a href="#"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
        @endcan
        <li class="">

           <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
             <i class="fa fa-power-off text-red"></i>   <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
</div>


<script src="{{asset('js/app.js')}}"></script>

<script>

  
  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var title = button.data('mytitle') 
      var description = button.data('mydescription') 
      var cat_id = button.data('catid') 
      var modal = $(this)
      var org_id = button.data('org_id') 
      var org_name = button.data('org_name') 
      var org_phone = button.data('org_phone') 
      var org_email = button.data('org_email') 
      var org_website = button.data('org_website') 
      var org_logo = button.data('org_logo') 
      var ppl_id = button.data('ppl_id') 
      var ppl_name = button.data('ppl_name') 
      var ppl_phone = button.data('ppl_phone') 
      var ppl_email = button.data('ppl_email') 
      var ppl_avatar = button.data('ppl_avatar') 

      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #des').val(description);
      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #org_id').val(org_id);
      modal.find('.modal-body #org_name').val(org_name);
      modal.find('.modal-body #org_phone').val(org_phone);
      modal.find('.modal-body #org_email').val(org_email);
      modal.find('.modal-body #org_website').val(org_website);
      //modal.find('.modal-body #org_logo').val(org_logo);
      modal.find('.modal-body #ppl_id').val(ppl_id);
      modal.find('.modal-body #ppl_name').val(ppl_name);
      modal.find('.modal-body #ppl_phone').val(ppl_phone);
      modal.find('.modal-body #ppl_email').val(ppl_email);
      //modal.find('.modal-body #ppl_avatar').val(ppl_avatar);
})


  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var org_id = button.data('org_id') 
      var person_id = button.data('ppl_id') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #org_id').val(org_id);
      modal.find('.modal-body #person_id').val(person_id);
})

  $('#detail').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var modal = $(this)
      var org_id = button.data('org_id') 
      var org_name = button.data('org_name') 
      var org_phone = button.data('org_phone') 
      var org_email = button.data('org_email') 
      var org_website = button.data('org_website') 
      var org_logo = button.data('org_logo') 
      var ppl_id = button.data('ppl_id') 
      var ppl_name = button.data('ppl_name') 
      var ppl_phone = button.data('ppl_phone') 
      var ppl_email = button.data('ppl_email') 
      var ppl_avatar = button.data('ppl_avatar') 

      modal.find('.modal-body #org_id_text').text(org_id);
      modal.find('.modal-body #org_name_text').text(org_name);
      modal.find('.modal-body #org_phone_text').text(org_phone);
      modal.find('.modal-body #org_email_text').text(org_email);
      modal.find('.modal-body #org_website_text').text(org_website);
      modal.find('.modal-body #org_logo_image').html("<img height='200px' src='{{ url('/') }}/images/logos/"+org_logo+"'>");
      modal.find('.modal-body #org_id_text').text(ppl_id);
      modal.find('.modal-body #ppl_name_text').text(ppl_name);
      modal.find('.modal-body #ppl_phone_text').text(ppl_phone);
      modal.find('.modal-body #ppl_email_text').text(ppl_email);
      modal.find('.modal-body #ppl_logo_image').html("<img height='200px' src='{{ url('/') }}/images/avatars/"+ppl_avatar+"'>");
})


</script>

</body>
</html>