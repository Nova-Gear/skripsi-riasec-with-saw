<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    protected $baseViewPath = 'layouts/admin/prestasi';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Prestasi::orderBy('id','DESC')->paginate(5);
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
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $prestasi = Prestasi::create($input);

        return redirect()->route('prestasi.index')
                        ->with('success','Prestasi created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = Prestasi::find($id);
        return view($this->baseViewPath.'.show',compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = Prestasi::find($id);

        return view($this->baseViewPath.'.edit',compact('prestasi'));
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
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $prestasi = Prestasi::find($id);
        $prestasi->update($input);

        return redirect()->route('prestasi.index')
                        ->with('success','Prestasi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prestasi::find($id)->delete();
        return redirect()->route('prestasi.index')
                        ->with('success','Prestasi deleted successfully');
    }
}
