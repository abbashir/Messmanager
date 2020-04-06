<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Http\Controllers\Controller;
use App\Ledger;
use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //login page
    public function ShowLoginForm()
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.loginForm');

    }

    //login process
    public function LoginAction(Request $request)
    {
        //return $request->all();
        //validation
        $this->validate($request, [
            'userName' => 'required',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('admin')->attempt(['userName' => $request->userName, 'password' => $request->password], $request->get('remember'))) {

            //redirect
            Session()->flash('success', 'You are successfully logged in !');
            return redirect()->route('admin.dashboard');
        } else {
            //redirect
            Session()->flash('warning', 'Please enter correct UserName and password!');
            return redirect()->route('admin.login');
        }


    }

    //dashboard
    public function dashboard()
    {
        $active_ledger = Ledger::where('active_status', 1)->first();
        $expenses = Expense::where('ledger_id', $active_ledger->id)->get();
        $meals = Meal::where('ledger_id', $active_ledger->id)->get();


        return view('admin.pages.dashboard', compact('expenses','active_ledger','meals'));
    }

    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login1');
    }
}
