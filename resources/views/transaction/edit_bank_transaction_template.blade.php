<?php //echo "<pre>"; print_r($additional_data); die();?>
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
        Edit Transaction
        <small></small>
      </h1>
      <hr/>
          <a href="{{ route('admin.transaction.index') }}" class="btn btn-primary">All Transactions</a>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">transaction</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    

      @include('messages/success')
      @include('messages/errors')


      <div style="width:60%">

        {!! Form::model($transaction, ['method' => 'PATCH','route' => ['admin.transaction.update', $transaction->id]]) !!}

     
        <div  class="form-group">

          {!! Form::label('bank_id','Bank : ',['class' => 'control-label']) !!}
          {!! Form::select('bank_id', $banks ,$transaction->bank_name,['class'=>'form-control']) !!}
        </div>

        <div  class="form-group">

          {!! Form::label('tran_date','Transaction Date : ',['class' => 'control-label']) !!}
          {!! Form::date('tran_date',$transaction->tran_date ,['class'=>'form-control']) !!}
        </div>

        <div  class="form-group">
          {!! Form::label('amount','Anount : ',['class' => 'control-label']) !!}
          {!! Form::number('amount', $additional_data['amount'], ['placeholder' => 'Amount','class'=>'form-control']) !!}
        </div>


         <label class="radio-inline">
          {!! Form::radio('tran_type', 'debit',true) !!}Debit<small>( withdraw )</small>
        </label>
        <label class="radio-inline">
          {!! Form::radio('tran_type', 'credit') !!}Credit<small>( deposit )</small>
        </label>
       
       
        

        <div  class="form-group">
          {!! Form::label('desctiption','Transaction Description : ',['class' => 'control-label']) !!}
          {!! Form::textarea('desctiption', $transaction->desctiption, ['placeholder' => 'Description','class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
      </div>


    
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

