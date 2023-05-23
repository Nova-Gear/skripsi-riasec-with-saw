<?php

namespace App\Http\Controllers\Admin;

use App\Models\RiasecTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiasecTestController extends Controller
{
    protected $baseViewPath = 'layouts/admin/riasec_tests';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riasecTests = RiasecTest::orderBy('id', 'DESC')->paginate(6);
        return view($this->baseViewPath.'.index', compact('riasecTests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->baseViewPath.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'soal' => 'required',
            'type' => 'required|in:R,I,A,S,E,C',
        ]);

        $riasecTest = RiasecTest::create($request->all());

        return redirect()->route('riasec_tests.index')
            ->with('success', 'Riasec test created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riasecTest = RiasecTest::find($id);
        return view($this->baseViewPath.'.edit', compact('riasecTest'));
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
        $this->validate($request, [
            'soal' => 'required',
            'type' => 'required|in:R,I,A,S,E,C',
        ]);

        $riasecTest = RiasecTest::find($id);
        $riasecTest->update($request->all());

        return redirect()->route('riasec_tests.index')
                        ->with('success','Riasec test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiasecTest $riasecTest)
    {
        $riasecTest->delete();
        return redirect()->route('riasec_tests.index')->with('success', 'Riasec Test deleted successfully');
    }
}    
