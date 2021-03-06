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
        Edit loan
        <small></small>
      </h1>
      <hr/>
       <a href="{{ route('admin.loan.index') }}" class="btn btn-primary">All loans</a>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">loan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    


      @include('messages/success')
      @include('messages/errors')


      <div style="width:60%">
        {!! Form::model($loan, ['method' => 'PATCH','route' => ['admin.loan.update', $loan->id]]) !!}

        <div  class="form-group">
          {!! Form::label('loan_date','Loan Date : ',['class' => 'control-label']) !!}
          {!! Form::date('loan_date', $loan->loan_date , ['placeholder' => 'Title','class'=>'form-control']) !!}
        </div>
        <div  class="form-group">

          {!! Form::label('type','Loan Type : ',['class' => 'control-label']) !!}
          {!! Form::select('type', ['credit'=>'Credit','debit'=>'debit'] ,$loan->type,['class'=>'form-control']) !!}
        </div>


        <div  class="form-group">
          {!! Form::label('amount','Loan Anount : ',['class' => 'control-label']) !!}
          {!! Form::number('amount', $loan->amount, ['placeholder' => 'Amount','class'=>'form-control']) !!}
        </div>


        <div  class="form-group">
          {!! Form::label('description','Loan Description : ',['class' => 'control-label']) !!}
          {!! Form::textarea('description', $loan->description, ['placeholder' => 'Description','class'=>'form-control']) !!}
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
