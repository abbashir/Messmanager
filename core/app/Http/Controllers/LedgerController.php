<?php

namespace App\Http\Controllers;

use App\Admin\Admin;
use App\Ledger;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('active_status', 'desc')->get();
        return view('admin.pages.ledger.index', compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $borders = Admin::where('isadmin', 0)->get();
        return view('admin.pages.ledger.create', compact('borders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ledger = new Ledger();

        $request_values = $request->all();
        unset($request_values['_token']);
        unset($request_values['name']);

        $ledger->name = $request->name;
        $ledger->borders = json_encode($request_values);
        $ledger->save();

        //redirect
        Session()->flash('success', 'successfully created!');
        return redirect()->route('ledger.index');
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
    public function destroy(Request $request)
    {
        if ($request->status == 1) {
            Ledger::where('id', $request->id)
                ->update(['active_status' => 0]);
        } elseif ($request->status == 0) {
            $active_ledger = Ledger::where('active_status', 1)->get();
            if (count($active_ledger) > 0) {
                Session()->flash('warning', 'Active another ledger !');
                return redirect()->back();
            } else {
                Ledger::where('id', $request->id)
                    ->update(['active_status' => 1]);
            }

        }
        //redirect
        Session()->flash('success', 'successful!');
        return redirect()->back();
    }
}
