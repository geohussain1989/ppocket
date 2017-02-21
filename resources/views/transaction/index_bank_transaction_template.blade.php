
<?php 
// print_r($select_filters);
// die();

?>
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
        Transactions List
        <small></small>
      </h1>
      <hr/>
       <a href="{{ route('admin.transaction.create') }}" class="btn btn-primary">Add</a>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">transaction</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       
      @include('messages/success')
      @include('messages/errors') 

  

      <div class="row">

      {!! Form::open(array('route' => 'admin.transaction.index', 'method' => 'get')) !!}

        <div class="form-group col-xs-2">
          Bank:{!! Form::select('bank_id',array('0' => 'All') + $bank_list ,$select_filters['s_bank'],['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-xs-2">
          From Date:    {!! Form::date('tran_date_from',$select_filters['s_from_date'],['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-xs-2">
          To Date: {!! Form::date('tran_date_to',$select_filters['s_to_date'],['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-xs-2">
         {!! Form::submit('Apply Filter'); !!}
       </div>

       {!! Form::close() !!}
     </div>

      
       <table class="table table-bordered table-striped table-hover">
        <thead>
         <th>Bank</th>
         <th>Transaction Date</th>
         <th>Debit</th>
         <th>Credit</th>
         <th>Balance</th>
         <th>Description</th>
         <th>Action</th>
       </thead>
       <tbody>

         @foreach($transactions as $transaction)
         <tr>
            <td>{{ $transaction->bank_name }}</td>
            <td>{{ $transaction->tran_date }}</td>
           
            <td>{{ $transaction->debit }}</td>
            <td>{{ $transaction->credit }}</td>
            <td>{{ $transaction->balance_amount }}</td>
            <td>
             
             <!-- Modal -->
              <div class="model-parent">
              <a href="#" class="description">Click here</a>
             
              <div id="descriptionModal" class="modal fade" role="dialog" style="display: none">
              
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Transaction Description</h4>
                    </div>
                    <div class="modal-body">
                      <p>{{ $transaction->desctiption }}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                  </div>

                </div>
              </div>
              <div>
              <!-- Modal -->


            </td>
            <td>




              {!! Form::open(array('route' => array('admin.transaction.destroy', $transaction->id), 'method' => 'delete')) !!}
              <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

        
       
       </tbody>
     </table>

    {{ $transactions->links() }}
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

<script>

$( document ).ready(function() {

    $('.description').on('click',function(){

      $(this).parent().find('#descriptionModal').modal('show');

    });
}); 

</script>
