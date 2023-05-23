<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiasecResult;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Ekstra;
use App\Models\RiasecTest;
use App\Models\Kriteria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        $data_count = [
            'user' => User::count(),
            'ukm' => Ukm::count(),
            'ekstra' => Ekstra::count(),
            'kriteria' => Kriteria::count(),
            'riasec_result' => RiasecResult::count(),
        ];
        $riasec_result = RiasecResult::orderBy('id','DESC')->paginate(5);
        return view('home', compact('riasec_result','data_count'));
    }
}
