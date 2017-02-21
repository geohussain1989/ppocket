<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bond;
use Session;


class BondsAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bond_amounts = Bond::all();
        return view('config/index_bonds_amount_template')->with('bond_amounts', $bond_amounts);

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
            'amount' => 'required',
            ]);
         $input = $request->all();
         Bond::create($input);

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
        'amount' => 'required',
        ]);

       $bond = Bond::findORFail($id);
       $input = $request->all();
       $bond->fill($input)->save();
       Session::flash('flash_message', 'Data updated successfully!');
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
       $bond = Bond::findORFail($id);
       $bond->delete();
       Session::flash('flash_message', 'Data deleted successfully!');
       return redirect()->back();
    }
}
