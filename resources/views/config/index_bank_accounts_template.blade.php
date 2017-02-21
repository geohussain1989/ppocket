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
        Bank Accounts List
        <small></small>
      </h1>
      <hr/>
       @include('messages/success')
      @include('messages/errors') 
    
      <div style="width:50%">
        {!! Form::open(['route' => 'admin.config.accounts.store' ]) !!}

        <div  class="form-group">
          {!! Form::label('bank_name','Bank Name : ',['class' => 'control-label']) !!}
          {!! Form::text('bank_name', '', ['placeholder' => 'Bank Name','class'=>'form-control']) !!}
        </div>
        <div  class="form-group">

          {!! Form::label('account_title','Account Title : ',['class' => 'control-label']) !!}
          {!! Form::text('account_title', '', ['placeholder' => 'Account Title','class'=>'form-control']) !!}
        
        </div>
        <div  class="form-group">
          {!! Form::label('account_type','Account Type : ',['class' => 'control-label']) !!}
          {!! Form::select('account_type', array('current' => 'Current', 'saving' => 'Saving') ,'null',['class'=>'form-control']) !!}
        </div>

        <div  class="form-group">

        {!! Form::label('balance_amount','Account Balance : ',['class' => 'control-label']) !!}
          {!! Form::number('balance_amount', '', ['placeholder' => 'Account Balance','class'=>'form-control']) !!}

        </div>
         <div  class="form-group">
          {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>

    


      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">accounts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <table class="table table-bordered table-striped table-hover">
        <thead>
         <th>ID</th>
         <th>Bank</th>
         <th>Account Title</th>
         <th>Account Type</th>
         <th>Account Balance</th>
         <th colspan="2">Action</th>
       </thead>
       <tbody>

         @foreach($bank_accounts as $bank_account)
         <tr>
            <td>{{ $bank_account->id }}</td>
            <td>{{ $bank_account->bank_name }}</td>
            <td>{{ $bank_account->account_title }}</td>
            <td>{{ $bank_account->account_type }}</td>
            <td>{{ $bank_account->balance_amount }}</td>
            <td>
           


              <!-- Modal -->
              <div class="model-parent">
              <span  class="btn btn-info edit" >Edit</span>
             
              <div id="editModal" class="modal fade" role="dialog" style="display: none">
              
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">

                   {!! Form::model($bank_account, ['method' => 'PATCH','route' => ['admin.config.accounts.update',$bank_account->id]]) !!}
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Bank Account</h4>
                    </div>
                    <div class="modal-body">

                      <div  class="form-group">
                        {!! Form::label('bank_name','Bank Name : ',['class' => 'control-label']) !!}
                        {!! Form::text('bank_name', $bank_account->bank_name , ['placeholder' => 'Bank Name','class'=>'form-control']) !!}
                      </div>
                      
                      <div  class="form-group">

                        {!! Form::label('account_title','Account Title : ',['class' => 'control-label']) !!}
                        {!! Form::text('account_title', $bank_account->account_title, ['placeholder' => 'Account Title','class'=>'form-control']) !!}

                      </div>

                      <div  class="form-group">
                        {!! Form::label('account_type','Account Type : ',['class' => 'control-label']) !!}
                        {!! Form::select('account_type', array('current' => 'Current', 'saving' => 'Saving') ,$bank_account->account_type,['class'=>'form-control']) !!}
                      </div>


                      <div  class="form-group">

                        {!! Form::label('balance_amount','Account Balance : ',['class' => 'control-label']) !!}
                        {!! Form::number('balance_amount', $bank_account->balance_amount, ['placeholder' => 'Account Balance','class'=>'form-control']) !!}

                      </div>
                     

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
                    </div>

                     {!! Form::close() !!}
                  </div>

                </div>
              </div>
              <div>
              <!-- Modal -->

              
            </td>
            <td>
              
             
                 {!! Form::open(array('route' => array('admin.config.accounts.destroy', $bank_account->id), 'method' => 'delete')) !!}
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
           

            </td>
        </tr>
        @endforeach

        
       
       </tbody>
     </table> 
  
    
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

    $('.edit').on('click',function(){

      $(this).parent().find('#editModal').modal('show');

    });
}); 

</script>
