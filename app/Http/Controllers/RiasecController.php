<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Ekstra;
use App\Models\Prestasi;
use App\Models\Kriteria;
use App\Models\RiasecTest;
use App\Models\RiasecResult;
use App\Models\BobotRiasec;
use DB;

class RiasecController extends Controller
{
    public function index(){
        // get 1 mahasiswa data
        $mahasiswa = User::where('name','mahasiswa')->first();
        $mahasiswa_id = $mahasiswa->id;

        // get prestasi mahasiswa
        $prestasi = $mahasiswa->prestasi;

        // get list ukm
        $ukm = Ukm::pluck('name');

        // get list ekstra
        $eksta = Ekstra::get();

        // get latest riasec result 
        $riasec_data = RiasecResult::select('result')->where('user_id',$mahasiswa_id)->orderBy('id','desc')->first();

        // get bobot riasec
        $bobot_riasec = BobotRiasec::get();

        /**
         * Construct kriteria data based on riasec result, ekstra, prestasi and ukm
         */

        // get the first three characters
        $riasec_res = $riasec_data->result; // A,C,R,I,E
        $riasec_res = explode(",", $riasec_res); // array(A, B, C, D)
        $riasec_res = array_slice($riasec_res, 0, 3);

        // query the bobot_riasec table
        $riasec_res = BobotRiasec::whereIn('Tipe',$riasec_res)
                        ->orderByRaw("FIELD(Tipe, '$riasec_res[0]', '$riasec_res[1]', '$riasec_res[2]')")
                        ->get();

        // build the result array
        $res = [];
        foreach ($riasec_res as $key => $result) {
            foreach (['A1', 'A2', 'A3', 'A4', 'A5', 'A6'] as $col) {
                $res[$key+1][$col] = $result->$col;
            }
        }

        // DUmmy Deleted Soon until found how to get data from ukm, prestasi, and ekstra
        $res[4]['A1'] = 0.5;
        $res[4]['A2'] = 0.5;
        $res[4]['A3'] = 0.5;
        $res[4]['A4'] = 1;
        $res[4]['A5'] = 0.5;
        $res[4]['A6'] = 0.5;

        $res[5]['A1'] = 0.5;
        $res[5]['A2'] = 1;
        $res[5]['A3'] = 0.5;
        $res[5]['A4'] = 1;
        $res[5]['A5'] = 1;
        $res[5]['A6'] = 0.5;

        $res[6]['A1'] = 0.5;
        $res[6]['A2'] = 1;
        $res[6]['A3'] = 0.5;
        $res[6]['A4'] = 0.5;
        $res[6]['A5'] = 1;
        $res[6]['A6'] = 0.5;

        // get bobot kriteria
        $weight = Kriteria::pluck('weight');
        $alternative = [];

        // make array final data alternative
        $i = 1;
        foreach ($ukm as $key => $nama_ukm) {

            $C1 = $res[1]['A'.$i];
            $C2 = $res[2]['A'.$i];
            $C3 = $res[3]['A'.$i];
            $C4 = $res[4]['A'.$i];
            $C5 = $res[5]['A'.$i];
            $C6 = $res[6]['A'.$i];

            $each_alt = [
                'name' => $nama_ukm, 
                'criteria' => [
                    $C1,$C2,$C3,$C4,$C5,$C6
                ]
            ];
            $alternatives[] = $each_alt;
            $i++;
        }

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
        usort($scores, function($a, $b) {
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
        return response()->json(['ranking_result' => $rankingResult]);
    }
}
