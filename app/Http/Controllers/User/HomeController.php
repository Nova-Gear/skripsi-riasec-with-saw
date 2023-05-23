<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BobotRiasec;
use App\Models\Ekstra;
use App\Models\Kriteria;
use App\Models\MahasiswaEkstra;
use App\Models\MahasiswaUkm;
use App\Models\Prestasi;
use App\Models\RiasecResult;
use App\Models\RiasecTest;
use App\Models\Ukm;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $baseViewPath = 'layouts/user/';
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
        $this->user_id = auth()->user()->id;
        $results = RiasecResult::where('user_id', $this->user_id)
            ->orderByDesc('created_at')
            ->paginate(5);

        $saw_result = $this->countsaw();

        return view($this->baseViewPath . '.home', compact('results', 'saw_result'));
    }

    public function countSaw()
    {
        // mahasiswa data
        $mahasiswa = User::find($this->user_id);

        // get alternative data mahasiswa
        $data_riasec = $this->altRiasec($mahasiswa);
        $data_prestasi = $this->altPrestasi($mahasiswa);
        $data_ekstra = $this->altEkstra($mahasiswa);
        $data_ukm = $this->altUkm($mahasiswa);

        // check if data riasec exist
        if (count($data_riasec) == 0) {
            return [];
        }

        // merge all data
        $res_data = array_merge($data_riasec, $data_prestasi, $data_ekstra, $data_ukm);

        // get bobot kriteria
        $weight = Kriteria::pluck('weight');

        // construct final alternative data
        $alternatives = $this->finalAlt($res_data);

        // Normalize alternative data
        $norm_alt = $this->normalize($alternatives);

        // Calculate the score for each alternative
        $scores = [];
        foreach ($alternatives as $alt) {
            $score = 0;
            foreach ($alt['criteria'] as $key => $value) {
                if (isset($weight[$key])) {
                    $score += $value * $weight[$key];
                }
            }
            $scores[] = [
                'name' => $alt['name'],
                'score' => $score
            ];
        }

        // Sort the alternatives by their scores (highest to lowest)
        usort($scores, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        $rankingResult = array();
        foreach ($scores as $key => $alt) {  // iterate through the sorted alternatives array
            // add the current alternative's data to the ranking result array
            $rankingResult[] = array(
                'rank' => $key + 1,
                'name' => $alt['name'],
                'score' => $alt['score']
            );
        }

        // return the ranking result array as JSON data
        return $rankingResult;
    }

    // construct data alternative based on riasec data
    private function altRiasec($mahasiswa)
    {
        $mahasiswa_id = $mahasiswa->id;
        $res = [];

        // get latest riasec result
        $riasec_data = RiasecResult::select('result')->where('user_id', $mahasiswa_id)->orderBy('id', 'desc')->first();

        // check if data exist
        if (isset($riasec_data->result)) {
            // get the first three characters
            $riasec_res = $riasec_data->result;  // A,C,R,I,E
            $riasec_res = explode(',', $riasec_res);  // array(A, B, C, D)
            $riasec_res = array_slice($riasec_res, 0, 3);

            // query the bobot_riasec table
            $riasec_res = BobotRiasec::whereIn('Tipe', $riasec_res)
                ->orderByRaw("FIELD(Tipe, '$riasec_res[0]', '$riasec_res[1]', '$riasec_res[2]')")
                ->get();

            // build the result array
            foreach ($riasec_res as $key => $result) {
                foreach (['A1', 'A2', 'A3', 'A4', 'A5', 'A6'] as $col) {
                    $res[$key + 1][$col] = $result->$col;
                }
            }
        }

        return $res;
    }

    // construct data alternative based on prestasi data
    private function altPrestasi($mahasiswa)
    {
        $prestasi = $mahasiswa->prestasi;
        $res = [];

        // check if mahasiswa have prestasi or not
        if ($prestasi->count() > 0) {
            $prestasi_score = 1;
        } else {
            $prestasi_score = 0.5;
        }

        // append data to array
        for ($i = 1; $i <= 6; $i++) {
            $res[4]['A' . $i] = $prestasi_score;
        }

        return $res;
    }

    // construct data alternative based on ekstra data
    private function altEkstra($mahasiswa)
    {
        $ekstra = MahasiswaEkstra::where('user_id', $mahasiswa->id)->get();
        $res = [];

        // check if mahasiswa have ekstra or not
        if ($ekstra->count() > 0) {
            $ekstra_score = 1;
        } else {
            $ekstra_score = 0.5;
        }
        // append data to array
        for ($i = 1; $i <= 6; $i++) {
            $res[5]['A' . $i] = $ekstra_score;
        }

        return $res;
    }

    // construct data alternative based on ukm data
    private function altUkm($mahasiswa)
    {
        $ukm = MahasiswaUkm::where('user_id', $mahasiswa->id)->get();
        $res = [];

        // check if mahasiswa chose an ukm or not
        if ($ukm->count() > 0) {
            // if($pilihan_ukm->count() > 0){
            $ukm_score = 1;
        } else {
            $ukm_score = 0.5;
        }
        // append data to array
        for ($i = 1; $i <= 6; $i++) {
            $res[6]['A' . $i] = $ukm_score;
        }

        return $res;
    }

    // construct final data alternative
    private function finalAlt($res_data)
    {
        // get list ukm
        $ukm = Ukm::pluck('name');
        $alternatives = [];

        // make array final data alternative
        $i = 1;
        foreach ($ukm as $key => $nama_ukm) {
            if (isset($res_data[0]['A' . $i])) {
                $C1 = $res_data[0]['A' . $i];
                $C2 = $res_data[1]['A' . $i];
                $C3 = $res_data[2]['A' . $i];
                $C4 = $res_data[3]['A' . $i];
                $C5 = $res_data[4]['A' . $i];
                $C6 = $res_data[5]['A' . $i];

                $each_alt = [
                    'name' => $nama_ukm,
                    'criteria' => [
                        $C1, $C2, $C3, $C4, $C5, $C6
                    ]
                ];
                $alternatives[] = $each_alt;
                $i++;
            }
        }

        return $alternatives;
    }

    // normalize alternative data
    // Jika jenis kriteria adalah benefit, maka proses normalisasi dilakukan dengan cara membagi nilai atribut dengan nilai terbesar dari semua atribut pada kritera.
    private function normalize($alternatives)
    {
        $finalNormalized = [];
        // loop alternative
        foreach ($alternatives as $index => $alt) {
            $normalized = [];  // reset array normalized
            // find max data from criteria
            $max_criteria = max($alt['criteria']);
            // loop each criteria
            foreach ($alt['criteria'] as $key => $criteria) {
                // divide each value of criteria
                $norm_criteria = $criteria / $max_criteria;

                // append to array normalized
                $normalized[$key] = $norm_criteria;
            }
            // reconstruct alternative data after normalize
            $finalNormalized[$index]['nama'] = $alt['name'];
            $finalNormalized[$index]['criteria'] = $normalized;
        }

        return $finalNormalized;
    }
}
