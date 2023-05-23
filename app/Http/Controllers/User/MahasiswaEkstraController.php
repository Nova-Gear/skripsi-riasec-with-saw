<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaEkstra;
use App\Models\Ekstra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaEkstraController extends Controller
{
    protected $baseViewPath = 'layouts/user/ekstra/';
    protected $user_id;

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
        $ekstras = Ekstra::all();
        return view($this->baseViewPath . '.index', compact('ekstras'));
    }

    public function choose(Request $request)
    {
        $mahasiswa_id = Auth::id();
        $ekstra_id = $request->input('ekstra_id');

        // Check if the user has already joined the selected EKSTRA
        $mahasiswa_ekstra = MahasiswaEkstra::where('user_id', $mahasiswa_id)->where('ekstra_id', $ekstra_id)->first();
        if (!empty($mahasiswa_ekstra)) {
            return redirect()->back()->with('error', 'You have already choose this EKSTRA.');
        }

        // Create a new MahasiswaEkstra model and save it to the database
        $mahasiswa_ekstra = new MahasiswaEkstra();
        $mahasiswa_ekstra->user_id = $mahasiswa_id;
        $mahasiswa_ekstra->ekstra_id = $ekstra_id;
        $mahasiswa_ekstra->save();

        return redirect()->back()->with('success', 'You have successfully choose the EKSTRA.');
    }

    public function remove(Request $request)
    {
        $mahasiswa_id = Auth::id();
        $ekstra_id = $request->input('ekstra_id');

        // Check if the user has already joined the selected EKSTRA
        $mahasiswa_ekstra = MahasiswaEkstra::where('user_id', $mahasiswa_id)->where('ekstra_id', $ekstra_id)->first();
        if (empty($mahasiswa_ekstra)) {
            return redirect()->back()->with('error', 'You have not choose this EKSTRA.');
        }

        $mahasiswa_ekstra->delete();
        return redirect()->back()->with('success', 'You have remove the EKSTRA successfully!');
    }
}
