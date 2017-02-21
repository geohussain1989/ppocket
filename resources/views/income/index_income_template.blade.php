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
        Incomes List
        <small></small>
      </h1>
      <hr/>
       <a href="{{ route('admin.income.create') }}" class="btn btn-primary">Add</a>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">income</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       
      @include('messages/success')
      @include('messages/errors') 

      
       <table class="table table-bordered table-striped table-hover">
        <thead>
         <th>Title</th>
         <th>Type</th>
         <th>Amount</th>
         <th>Date</th>
         <th>Action</th>
       </thead>
       <tbody>

         @foreach($incomes as $income)
         <tr>
            <td>{{ $income->title }}</td>
            <td>{{ $income->type }}</td>
            <td>{{ $income->amount }}</td>
            <td>{{ $income->date }}</td>
            <td>

              {!! Form::open(array('route' => array('admin.income.destroy', $income->id), 'method' => 'delete')) !!}
              

              <span  class="btn btn-info view" value={{ $income->id }}>View</span>


              <a href="{{ route('admin.income.edit', $income->id) }}" class="btn btn-primary">Edit</a>
              
            
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

        
       
       </tbody>
     </table>

    {{ $incomes->links() }}
    </section>
    <!-- /.content -->

  </div>



  <!-- Modal -->
  <div id="viewModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Income Details</h4>
        </div>
        <div class="modal-body">
          <span><b>ID : </b></span><span id="inc_id"></span>
          <span></br><b>Title : </b></span></br><span id="inc_title"></span>
          <span></br><b>Type : </b></span><span id="inc_type"></span>
          <span></br><b>Amount : </b></span><span id="inc_amount"></span>
          <span></br><b>Date : </b></span><span id="inc_date"></span>
          <span></br><b>Description</b></span></br><span id="inc_description"></span>
          <span></br><b>Create Date : </b></span><span id="inc_createat"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- Modal -->






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


<script>

$( document ).ready(function() {


    
    $('.view').on('click',function(){

      var income_id = parseInt($(this).attr('value'));
      var url       = "<?php echo url('/').'/admin/income/'; ?>"+income_id;
      $.get(url ,function(response){

          var income_obj = jQuery.parseJSON(response);
          $('#inc_id').text(income_obj.id);
          $('#inc_title').text(income_obj.title);
          $('#inc_type').text(income_obj.type);
          $('#inc_amount').text(income_obj.amount);
          $('#inc_date').text(income_obj.date);
          $('#inc_description').text(income_obj.description);
          $('#inc_createat').text(income_obj.created_at);

          $('#viewModal').modal('show');
      });  

      
     
    });
}); 

</script>
