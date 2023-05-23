<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaUkm;
use App\Models\Ukm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UkmController extends Controller
{
    protected $baseViewPath = 'layouts/user/ukm/';
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
        $ukms = Ukm::all();
        return view($this->baseViewPath . '.index', compact('ukms'));
    }

    public function choose(Request $request)
    {
        $mahasiswa_id = Auth::id();
        $ukm_id = $request->input('ukm_id');

        // Check if the user has already joined the selected UKM
        $mahasiswa_ukm = MahasiswaUkm::where('user_id', $mahasiswa_id)->where('ukm_id', $ukm_id)->first();
        if (!empty($mahasiswa_ukm)) {
            return redirect()->back()->with('error', 'You have already choose this UKM.');
        }

        // Create a new MahasiswaUkm model and save it to the database
        $mahasiswa_ukm = new MahasiswaUkm();
        $mahasiswa_ukm->user_id = $mahasiswa_id;
        $mahasiswa_ukm->ukm_id = $ukm_id;
        $mahasiswa_ukm->save();

        return redirect()->back()->with('success', 'You have successfully choose the UKM.');
    }

    public function remove(Request $request)
    {
        $mahasiswa_id = Auth::id();
        $ukm_id = $request->input('ukm_id');

        // Check if the user has already joined the selected UKM
        $mahasiswa_ukm = MahasiswaUkm::where('user_id', $mahasiswa_id)->where('ukm_id', $ukm_id)->first();
        if (empty($mahasiswa_ukm)) {
            return redirect()->back()->with('error', 'You have not choose this UKM.');
        }

        $mahasiswa_ukm->delete();
        return redirect()->back()->with('success', 'You have remove the UKM successfully!');
    }
}
