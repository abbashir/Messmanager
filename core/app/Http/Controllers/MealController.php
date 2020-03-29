<?php

namespace App\Http\Controllers;

use App\Admin\Admin;
use App\Expense;
use App\Ledger;
use App\Meal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_ledger = Ledger::where('active_status', 1)->first();
        $meals = Meal::orderBy('date', 'desc')->where('ledger_id', $active_ledger->id)->where('manager_id', Auth::guard('admin')->id())->get();
        return view('admin.pages.meal.index', compact('meals','active_ledger'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ledgers = Ledger::where('active_status', 1)->first();
        $ledgers = json_decode($ledgers->borders, true);
        $border_id = array();
        foreach ($ledgers as $key => $value) {
            $border_id[] = $key;
        }

        $borders = Admin::whereIn('id', $border_id)->get();

        $ledgers = Ledger::where('active_status', 1)->get();
        return view('admin.pages.meal.create', compact('borders', 'ledgers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today_total_meal = 0;
        foreach (array_combine($request->border_id, $request->meal_quantity) as $id => $quantity) {
            $today_total_meal += $quantity;
            $meal_details[$id] = $quantity;
        }

        $meal = new Meal();
        $meal->ledger_id = $request->ledger_id;
        $meal->date = Carbon::parse($request->date)->format('d/m/Y');
        $meal->manager_id = Auth::guard('admin')->user()->id;
        $meal->today_total_meal = $today_total_meal;
        $meal->meal_details = json_encode($meal_details);
        $meal->save();

        //redirect
        Session()->flash('success', 'meal created!');
        return redirect()->route('meal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
