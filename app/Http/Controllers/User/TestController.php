<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RiasecResult;
use App\Models\RiasecTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    protected $baseViewPath = 'layouts/user/test';

    public function show()
    {
        $questions = RiasecTest::all();

        return view($this->baseViewPath . '.test', compact('questions'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'answer' => 'required|array',
            'answer.*' => 'required|in:R,I,A,S,E,C,X',
        ]);

        $userId = Auth::id();
        $userAnswers = $request->input('answer');

        $scores = [
            'R' => 0,
            'I' => 0,
            'A' => 0,
            'S' => 0,
            'E' => 0,
            'C' => 0,
        ];

        // Loop through each user answer and calculate the scores
        foreach ($userAnswers as $answer) {
            switch ($answer) {
                case 'R':
                    $scores['R']++;
                    break;
                case 'I':
                    $scores['I']++;
                    break;
                case 'A':
                    $scores['A']++;
                    break;
                case 'S':
                    $scores['S']++;
                    break;
                case 'E':
                    $scores['E']++;
                    break;
                case 'C':
                    $scores['C']++;
                    break;
                case 'X':
                    break;
            }
        }

        // Sort the scores in descending order and get the keys
        arsort($scores);
        $result = implode(',', array_keys($scores));
        $score = implode(',', $scores);

        RiasecResult::create([
            'user_id' => $userId,
            'answer' => implode(',', $userAnswers),
            'score' => $score,
            'result' => $result,
        ]);

        return redirect()->route('test.result');
    }

    public function result()
    {
        $userId = Auth::id();
        $result = RiasecResult::where('user_id', $userId)->latest()->first();
        return view($this->baseViewPath . '.result', compact('result'));
    }
}
