<?php

namespace App\Http\Controllers\Journals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Journal;
use Yajra\Datatables\Datatables;
class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.journal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::latest()->get();
        return view('dashboard.journal.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'transact_date' => 'required',
        ]);
        $data = [];
        $inside = [];

        foreach($request->account_id as $key => $value){
            $data[$key]["transact_date"] = $request->transact_date;
            $data[$key]["account_id"] = $value;
            $data[$key]["created_at"] = now();
            $data[$key]["updated_at"] = now();
        }
        foreach($request->debt as $key => $value){
            $data[$key]["debt"] = $value;
        }
        foreach($request->credit as $key => $value){
            $data[$key]["credit"] = $value;
        }
        // dd($data);
        Journal::insert($data);

        return redirect()->route('journals.index')->with('message','berhasil menambahkan jurnal');
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

    public function getJournalsDatatable(){
        $Journals = Journal::latest();
        return Datatables::of($Journals)
                ->editColumn('account_id',function($journals){
                    return $journals->account->name;
                })
                ->editColumn('debt', function($journals){
                    return $journals->debt_price_for_humans;
                })
                ->editColumn('credit', function($journals){
                    return $journals->credit_price_for_humans;
                })
                ->make(true);
    }
}
