<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\BankAccount;


class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank_accounts = BankAccount::all();
        return view('config/index_bank_accounts_template')->with('bank_accounts', $bank_accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'bank_name' => 'required',
            'account_title' => 'required',
            'balance_amount' => 'required',
            ]);
           $input = $request->all();

           
           BankAccount::create($input);

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
        //
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
            'bank_name' => 'required',
            'account_title' => 'required',
            ]);

       $account = BankAccount::findORFail($id);
       $input = $request->all();
       $account->fill($input)->save();
       Session::flash('flash_message', 'Bank Account updated successfully!');
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
        $account = BankAccount::findORFail($id);
        $account->delete();
        Session::flash('flash_message', 'Bank Account deleted successfully!');
        return redirect()->back();
    }
}
