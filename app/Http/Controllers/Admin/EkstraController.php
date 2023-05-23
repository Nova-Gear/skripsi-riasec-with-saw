<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekstra;

class EkstraController extends Controller
{
    protected $baseViewPath = 'layouts/admin/ekstra';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Ekstra::orderBy('id','DESC')->paginate(5);
        return view($this->baseViewPath.'.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
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
            'name' => 'required'
        ]);

        $input = $request->all();

        $ekstra = Ekstra::create($input);

        return redirect()->route('ekstra.index')
                        ->with('success','Ekstra created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ekstra = Ekstra::find($id);
        return view($this->baseViewPath.'.show',compact('ekstra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ekstra = Ekstra::find($id);

        return view($this->baseViewPath.'.edit',compact('ekstra'));
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
            'name' => 'required'
        ]);

        $input = $request->all();

        $ekstra = Ekstra::find($id);
        $ekstra->update($input);

        return redirect()->route('ekstra.index')
                        ->with('success','Ekstra updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ekstra::find($id)->delete();
        return redirect()->route('ekstra.index')
                        ->with('success','Ekstra deleted successfully');
    }
}
