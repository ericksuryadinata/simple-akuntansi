<?php

namespace App\Http\Controllers\Outcomes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Outcome;
use Yajra\Datatables\Datatables;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.outcome.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::latest()->get();
        return view('dashboard.outcome.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Outcome::create($request->all());

        return redirect()->route('outcomes.index')->with('message','Transaksi berhasil ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOutcomesDatatable(){
        $outcomes = Outcome::latest();
        return Datatables::of($outcomes)
                ->editColumn('account_id',function($outcome){
                    return $outcome->account->name;
                })
                ->editColumn('amount', function($outcome){
                    return $outcome->price_for_humans;
                })
                ->editColumn('payment_method', function($outcome){
                    return ($outcome->payment_method === 'D') ? 'DEBIT' : 'KREDIT';
                })
                ->make(true);
    }
}
