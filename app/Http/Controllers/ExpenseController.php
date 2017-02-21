<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Config;
use Session;
use App\Expense;
use App\ExpenseTypes;

use Illuminate\Support\Facades\DB;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $per_page_limit = config('myconstants.ITEMS_PER_PAGE');
         $expenses = DB::table('expenses')
        ->join('expense_types', 'expenses.expense_type', '=', 'expense_types.id')
        ->select('expenses.*', 'expense_types.title as expense_type')
        ->paginate($per_page_limit);
    
        return view('expense/index_expense_template')->with('expenses' ,$expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // die('Add Exp');
        $expense_types = ExpenseTypes::lists('title','id');
        return view('expense/create_expense_template')->with(['expense_types' =>  $expense_types ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
                'title' => 'required',
                'amount' => 'required',
            ]);
         $input = $request->all();
         Expense::create($input);

         Session::flash('flash_message','Data successfully added!');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $expense = DB::table('expenses')
            ->join('expense_types','expenses.expense_type','=','expense_types.id')
            ->where('expenses.id',$id)
            ->select('expenses.*','expense_types.title as type')
            ->first();

        return json_encode($expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
      $expense = Expense::findORFail($id);
      $expense_types = ExpenseTypes::lists('title','id');
      return view('expense/edit_expense_template')->with(['expense'=>$expense,'expense_types'=>$expense_types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         $this->validate($request,[
                'title' => 'required',
                'amount' => 'required',
            ]);
        
        $expense = Expense::findORFail($id);
        $input = $request->all();
        $expense->fill($input)->save();
        Session::flash('flash_message', 'Expense updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $expense = Expense::findORFail($id);
       $expense->delete();
       Session::flash('flash_message', 'Expense deleted successfully!');
       return redirect()->back();
    }
}
