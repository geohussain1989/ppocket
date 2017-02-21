<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use App\Loan;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $per_page_limit = config('myconstants.ITEMS_PER_PAGE');
        $loans = Loan::paginate($per_page_limit);
        return view('loan/index_loan_template')->with('loans', $loans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan/create_loan_template');

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
            'amount' => 'required',
            'type' => 'required',
            'description' => 'required',
            ]);
        $input = $request->all();
        Loan::create($input);

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
        $loan = Loan::findORFail($id);
        return view('loan/edit_loan_template')->with(['loan'=>$loan]);
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
            'amount' => 'required',
            'type' => 'required',
            'description' => 'required',
            ]);
        $loan = Loan::findORFail($id);
        $input = $request->all();
        $loan->fill($input)->save();
        
        Session::flash('flash_message', 'Loan updated successfully!');
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
        
        $loan = Loan::findORFail($id);
        $loan->delete();
        Session::flash('flash_message', 'Loan deleted successfully!');
        return redirect()->back();

    }
}
