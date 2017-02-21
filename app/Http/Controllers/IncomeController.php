<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Config;
use Session;
use App\Income;
use App\IncomeTypes;

use Illuminate\Support\Facades\DB;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $per_page_limit = config('myconstants.ITEMS_PER_PAGE');

        $incomes = DB::table('incomes')
            ->join('income_types', 'incomes.type', '=', 'income_types.id')
            ->select('incomes.*', 'income_types.title as type')
            ->paginate($per_page_limit);

        return view('income/index_income_template')->with('incomes' ,$incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $income_types = IncomeTypes::lists('title','id');
        return view('income/create_income_template')->with(['income_types' => $income_types ]);
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
                'description' => 'required',
                'amount' => 'required',
            ]);
         $input = $request->all();
         Income::create($input);

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
       // $income = Income::findORFail($id);
        $income = DB::table('incomes')
            ->join('income_types','incomes.type','=','income_types.id')
            ->where('incomes.id',$id)
            ->select('incomes.*','income_types.title as type')
            ->first();

        return json_encode($income);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $income = Income::findORFail($id);
      $income_types = IncomeTypes::lists('title','id');
      return view('income/edit_income_template')->with(['income'=>$income,'income_types'=>$income_types]);
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
            'description' => 'required',
            'amount' => 'required'
            ]);
        
        $income = Income::findORFail($id);
        $input = $request->all();
        $income->fill($input)->save();
        Session::flash('flash_message', 'Income updated successfully!');
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


        $income = Income::findORFail($id);
        $income->delete();
        Session::flash('flash_message', 'Income deleted successfully!');
        return redirect()->back();



    }
}
