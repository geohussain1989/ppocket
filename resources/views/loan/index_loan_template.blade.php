<!DOCTYPE html>
<html>
@include('admin-includes/site_header')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('admin-includes/main_header');
  <!-- Left side column. contains the logo and sidebar -->
  
   @include('admin-includes/main_sidebar');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        loans List
        <small></small>
      </h1>
      <hr/>
       <a href="{{ route('admin.loan.create') }}" class="btn btn-primary">Add</a>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">loan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       
      @include('messages/success')
      @include('messages/errors') 

      
       <table class="table table-bordered table-striped table-hover">
        <thead>
         <th>Date</th>
         <th>Type</th>
         <th>Amount</th>
         <th>Description</th>
         <th>Action</th>
       </thead>
       <tbody>

         @foreach($loans as $loan)
         <tr>
            <td>{{ $loan->loan_date }}</td>
            <td>{{ $loan->type }}</td>
            <td>{{ $loan->amount }}</td>
            <td>{{ $loan->description }}</td>
            <td>

              {!! Form::open(array('route' => array('admin.loan.destroy', $loan->id), 'method' => 'delete')) !!}
              

              <a href="{{ route('admin.loan.edit', $loan->id) }}" class="btn btn-primary">Edit</a>
              
            
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

        
       
       </tbody>
     </table>

    {{ $loans->links() }}
    </section>
    <!-- /.content -->

  </div>




  <!-- /.content-wrapper -->

  <!-- Main Footer -->
   @include('admin-includes/main_footer');
  
  <!-- Control Sidebar -->
   @include('admin-includes/control_sidebar');
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 @include('admin-includes/site_footer');

</body>
</html>

