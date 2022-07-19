<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tps;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('onlyTps');
    }

    public function viewTps()
    {
        $showAllListedTps = Tps::where('id','!=',0)->get();
        return response()->json($showAllListedTps);
    }

    public function input()
    {
        return view('inputSampah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registerTps = $request->validate([
            'tps' => 'required|max:255',
        ]);


        $saveData = User::create([
            'name' => $registerTps['tps'],
        ]);

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
    public function update(Request $request)
    {
        $inputUpdateTps = $request->input();


        $updateTps = User::where('id',$inputUpdateTps['id'])->update([
            'name' => $inputUpdateTps['tps'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Sampah::destroy($request->id);
    }
}
