<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function ShowExpenseByUser(Request $request)
    {

        $active_ledger = Ledger::where('active_status', 1)->first();
        $ledger_id = (isset($request->ledger_id)) ? $request->ledger_id : $active_ledger->id;
        $logged_user = Auth::guard('admin')->user()->id;
        $manager_id = (isset($request->border_id)) ? $request->border_id : $logged_user;

        $expenses = Expense::where('ledger_id', $ledger_id)->where('manager_id', $manager_id)->get();
        $ledger = Ledger::find($ledger_id);
        return view('admin.pages.expense.expense_byID', compact('expenses', 'ledger'));

    }
}
