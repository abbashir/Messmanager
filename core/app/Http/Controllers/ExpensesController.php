<?php

namespace App\Http\Controllers;

use App\Admin\Admin;
use App\Expense;
use App\Ledger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::all();
        $borders = Admin::where('isadmin', 0)->get();
        return view('admin.pages.expense.index',compact('borders','ledgers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active_ledger = Ledger::where('active_status', 1)->first();
        return view('admin.pages.expense.create',compact('active_ledger'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $expense = new Expense();
        $ledgers = Ledger::where('active_status', 1)->first();

        $tp = 0;
        foreach ($request->price as $p) {
            $tp += $p;
        }
        $expense->ledger_id = $ledgers->id;
        $expense->manager_id = Auth::guard('admin')->user()->id;
        $expense->date = Carbon::parse($request->expense_date)->format('d/m/Y');
        $expense->item_name = json_encode($request->item_name);
        $expense->quantity = json_encode($request->quantity);
        $expense->price = json_encode($request->price);
        $expense->total_price = $tp;
        $expense->save();

        //redirect
        Session()->flash('success', 'Expense created!');
        return redirect()->route('expense.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
