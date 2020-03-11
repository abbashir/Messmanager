<?php

namespace App\Http\Controllers;

use App\Admin\Admin;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $borders = Admin::where('isadmin', 0)->get();
        return view('admin.pages.addmeal', compact('borders'));
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
            $meal_details[$id]=$quantity;
        }

        $meal = new Meal();
        $meal->date = Carbon::parse($request->date)->format('d/m/Y');
        $meal->manager_id = Auth::guard('admin')->user()->id;
        $meal->today_total_meal = $today_total_meal;
        $meal->meal_details = json_encode($meal_details);
        $meal->save();

        //redirect
        Session()->flash('success', 'meal created!');
        return redirect()->back();
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
