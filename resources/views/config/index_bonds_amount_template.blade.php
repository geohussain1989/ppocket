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
        Price Bond Amount
        <small></small>
      </h1>
      <hr/>
       @include('messages/success')
      @include('messages/errors') 
    
      <div style="width:50%">
        {!! Form::open(['route' => 'admin.config.bonds.store' ]) !!}
        <div  class="form-group">
          {!! Form::label('amount','Bond Amount : ',['class' => 'control-label']) !!}
          {!! Form::text('amount', '', ['placeholder' => 'Bond Amount','class'=>'form-control']) !!}
         {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>

    


      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>admin</a></li>
        <li class="active">config</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      
        <table class="table table-bordered table-striped table-hover">
        <thead>
         <th>ID</th>
         <th>Amount</th>
         <th colspan="2">Action</th>
       </thead>
       <tbody>

         @foreach($bond_amounts as $bond)
         <tr>
            <td>{{ $bond->id }}</td>
            <td>{{ $bond->amount }}</td>
            <td>
         

              <!-- Modal -->
              <div class="model-parent">
              <span  class="btn btn-info edit" >Edit</span>
             
              <div id="editModal" class="modal fade" role="dialog" style="display: none">
              
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">

                   {!! Form::model($bond, ['method' => 'PATCH','route' => ['admin.config.bonds.update',$bond->id]]) !!}
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Bond Amount</h4>
                    </div>
                    <div class="modal-body">

                      <div  class="form-group">
                        {!! Form::label('amount','Bond Amount : ',['class' => 'control-label']) !!}
                        {!! Form::text('amount', $bond->amount, ['placeholder' => 'Bond Amount','class'=>'form-control']) !!}
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
              </div>
              <!-- Modal -->

              
            </td>
            <td>
              
            {!! Form::open(array('route' => array('admin.config.bonds.destroy', $bond->id), 'method' => 'delete')) !!}
              

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
