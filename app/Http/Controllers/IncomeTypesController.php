<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\IncomeTypes;
use Session;

class IncomeTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_types = IncomeTypes::all();
        return view('config/index_income_types_template')->with('income_types',$income_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            ]);
         $input = $request->all();
         IncomeTypes::create($input);

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
        
        $income_type = IncomeTypes::findORFail($id);
        return json_encode($income_type);
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
            ]);
        
        $income = IncomeTypes::findORFail($id);
        $input = $request->all();
        $income->fill($input)->save();
        Session::flash('flash_message', 'Income Type updated successfully!');
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
      $income = IncomeTypes::findORFail($id);
      $income->delete();
      Session::flash('flash_message', 'Income Type deleted successfully!');
      return redirect()->back();
    }
}
