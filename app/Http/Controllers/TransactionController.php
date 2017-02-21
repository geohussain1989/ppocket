<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Transaction;
use App\BankAccount;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        ///echo Carbon::today()->format('Y-m-d'); die();

       // echo $mytime = Carbon::now()->format('m/d/Y'); die();

         $bank_list = array();
         $bank_id = $request->input('bank_id');
         $from_date = $request->input('tran_date_from');
         $to_date = $request->input('tran_date_to');
         $selected_filters = array();

         $selected_filters = array(

                's_bank' => isset($bank_id) ? $bank_id : 0,
                's_from_date' => isset($from_date) ? $from_date : "",
                's_to_date' => isset($to_date) ? $to_date : Carbon::now()->format('m-d-Y'),
            );


         $banks = BankAccount::all(array('id','bank_name'));
         foreach ($banks as $bank) {
            $bank_list[$bank->id] = $bank->bank_name;
        }

         $per_page_limit = config('myconstants.ITEMS_PER_PAGE');


         // $transactions   = DB::table('transactions')
         //    ->join('bank_accounts','transactions.bank_id','=','bank_accounts.id')
         //    ->select('transactions.*','bank_accounts.bank_name','bank_accounts.balance_amount')
         //    ->orderBy('id','desc')
         //    ->paginate($per_page_limit); 


           

             $transactions = DB::table('transactions')
            ->join('bank_accounts','transactions.bank_id','=','bank_accounts.id')
            ->select('transactions.*','bank_accounts.bank_name','bank_accounts.balance_amount')
            ->when($bank_id ,function($query) use ($bank_id){
                      return $query->where('bank_id', $bank_id);
            })
            ->orderBy('id','desc')
            ->paginate($per_page_limit); 


            

         return view('transaction/index_bank_transaction_template')->with([
                        'transactions'   => $transactions,
                        'bank_list'      => $bank_list,
                        'select_filters' => $selected_filters ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank_list = array();
        $banks = BankAccount::all(array('id','bank_name'));
        foreach ($banks as $bank) {
            $bank_list[$bank->id] = $bank->bank_name;
        }

        return view('transaction/create_bank_transaction_template')->with('bank_list' ,$bank_list);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $save_values = array();
        $update_balance = array();
        $current_balance = 0;
        $new_balance = 0;
        
        $this->validate($request,[
                'tran_date' => 'required',
                'desctiption' => 'required',
                'amount' => 'required',
            ]);
         $input = $request->all();
         $account = BankAccount::findORFail($input['bank_id']);
         $current_balance = $account->balance_amount;


         $save_values['_token'] = $input['_token'];
         $save_values['bank_id'] = $input['bank_id'];
         $save_values['tran_date'] = $input['tran_date'];
         $save_values['desctiption'] = $input['desctiption'];

         if($input['tran_type'] == 'credit')
         {
            $save_values['credit'] = $input['amount'];
            $new_balance  =  $current_balance + $input['amount'];
         }
         else if($input['tran_type'] == 'debit')
         {
            $save_values['debit'] = $input['amount'];
            $new_balance  =  $current_balance - $input['amount'];
         }


         Transaction::create($save_values);
         $update_balance = array(
                'balance_amount' => $new_balance,
            );

         $account->fill($update_balance)->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $additional_data = array();
      $transaction = Transaction::findORFail($id);
      $banks = BankAccount::lists('bank_name','id');

     
      if( $transaction->debit != 0)
      {

        $additional_data = array(
            'is_debit' => true,
            'is_credit' => false,
            'amount' => $transaction->debit,
            );

      }
      else if( $transaction->credit != 0)
      {

        $additional_data = array(
            'is_debit' => false,
            'is_credit' => true,
            'amount' => $transaction->credit,
            );

      }


      return view('transaction/edit_bank_transaction_template')->with(['transaction'=>$transaction,'banks'=>$banks,'additional_data'=> $additional_data]);
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


       

        $save_values = array();
        $update_balance = array();
        $current_balance = 0;
        $new_balance = 0;
        
        $this->validate($request,[
                'tran_date' => 'required',
                'desctiption' => 'required',
                'amount' => 'required',
            ]);
         $input = $request->all();



         $account = BankAccount::findORFail($input['bank_id']);
         $current_balance = $account->balance_amount;


         $save_values['_token'] = $input['_token'];
         $save_values['bank_id'] = $input['bank_id'];
         $save_values['tran_date'] = $input['tran_date'];
         $save_values['desctiption'] = $input['desctiption'];

         if($input['tran_type'] == 'credit')
         {
            $save_values['credit'] = $input['amount'];
            $save_values['debit'] = 0;
            $new_balance  =  $current_balance + $input['amount'];
         }
         else if($input['tran_type'] == 'debit')
         {
            $save_values['debit'] = $input['amount'];
            $save_values['credit'] = 0;
            $new_balance  =  $current_balance - $input['amount'];
         }


        $transaction = Transaction::findORFail($id);
        $transaction->fill($save_values)->save();

         $update_balance = array(
                'balance_amount' => $new_balance,
            );

         $account->fill($update_balance)->save();

         Session::flash('flash_message','Data successfully added!');
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
       $transaction = Transaction::findORFail($id);
       $transaction->delete();
       Session::flash('flash_message', 'Income Type deleted successfully!');
       return redirect()->back();
    }

     public function filters()
     {
      


         die('apply filters');
         echo $bank_id = Request::get('bank_id');
         echo $date_from = Request::get('tran_date_from');
         echo $date_to = Request::get('tran_date_to');



     }
}
