<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/public/assets/images/shussain.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Syed Muhammad Hussain</p>
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
      


      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
    
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Income/Expense</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/income') }}">Income List</a></li>
            <li><a href="{{ route('admin.income.create') }}">Add Income</a></li>
             <li><a href="{{ url('admin/expense') }}">Expenses List</a></li>
            <li><a href="{{ route('admin.expense.create') }}">Add Expense</a></li>
          </ul>
             </li>



             <li class="treeview">
             <a href="#"><i class="fa fa-link"></i> <span>Bank Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.transaction.index') }}">Transactions List</a></li>
                <li><a href="{{ route('admin.transaction.create') }}">Add Transaction</a></li>
              </ul>
            </li>


            <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Loans</span> <i class="fa fa-angle-left pull-right"></i></a>
             <ul class="treeview-menu">
              <li><a href="{{ route('admin.loan.index') }}">Loans List</a></li>
              <li><a href="{{ route('admin.loan.create') }}">Add Loan</a></li>
            </ul>
          </li>


             <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Income</a></li>
              </ul>
            </li>
      



             <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Config</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/config/income') }}">Income Types</a></li>
                <li><a href="{{ url('admin/config/expense') }}">Expense Types</a></li>
                <li><a href="{{ url('admin/config/accounts') }}">Bank Accounts</a></li>
                <li><a href="{{ url('admin/config/bondz') }}">Bondz</a></li>
              </ul>
            </li>
      
      </ul>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>