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
        Expense List
        <small></small>
      </h1>
      <hr/>
       <a href="{{ route('admin.expense.create') }}" class="btn btn-primary">Add</a>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">expense</li>
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

         @foreach($expenses as $expense)
         <tr>
            <td>{{ $expense->title }}</td>
            <td>{{ $expense->expense_type }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->date }}</td>
            <td>

              {!! Form::open(array('route' => array('admin.expense.destroy', $expense->id), 'method' => 'delete')) !!}
              

              <span  class="btn btn-info view" value={{ $expense->id }}>View</span>


              <a href="{{ route('admin.expense.edit', $expense->id) }}" class="btn btn-primary">Edit</a>
              
            
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

        
       
       </tbody>
     </table>

    {{ $expenses->links() }}
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
          <h4 class="modal-title">Expense Details</h4>
        </div>
        <div class="modal-body">
          <span><b>ID : </b></span><span id="exp_id"></span>
          <span></br><b>Title : </b></span></br><span id="exp_title"></span>
          <span></br><b>Type : </b></span><span id="exp_type"></span>
          <span></br><b>Amount : </b></span><span id="exp_amount"></span>
          <span></br><b>Date : </b></span><span id="exp_date"></span>
          <span></br><b>Comments :</b></span></br><span id="exp_comments"></span>
          <span></br><b>Create Date : </b></span><span id="exp_createat"></span>
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

      var expense_id = parseInt($(this).attr('value'));
      var url       = "<?php echo url('/').'/admin/expense/'; ?>"+expense_id;
      $.get(url ,function(response){

          var expense_obj = jQuery.parseJSON(response);
          $('#exp_id').text(expense_obj.id);
          $('#exp_title').text(expense_obj.title);
          $('#exp_type').text(expense_obj.type);
          $('#exp_amount').text(expense_obj.amount);
          $('#exp_date').text(expense_obj.date);
          $('#exp_comments').text(expense_obj.comments);
          $('#exp_createat').text(expense_obj.created_at);

          $('#viewModal').modal('show');
      });  

      
     
    });
}); 

</script>
