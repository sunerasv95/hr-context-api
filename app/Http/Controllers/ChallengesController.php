<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChallengesController extends Controller
{
    public function challengeTwo($input)
    {
        $numbersArr =  $resultsArr =  [];

        //populating numbers array
        for($i=0; $i < $input; $i++){
            //generate random number
            $randNum = rand(0, $input);

            //add to numbers array
            array_push($numbersArr, $randNum);
        }

        //find number of duplicates
        $findDuplicates = array_count_values($numbersArr);

        //filtered out numbers which are occured more than 1
        foreach($findDuplicates as $k => $item){
            if($item > 1) array_push($resultsArr, $k);
        }

        return response()->json([
            "numbers_array" => $numbersArr,
            "duplicates_found" => $resultsArr
        ]);
    }

    public function challengeFour()
    {
        $filesArr = [
            "insurance.txt" => "Company A", 
            "letter.docx" => "Company A", 
            "Contract.docx" => "Company B"
        ];

        $results = [];

        foreach($filesArr as $k => $file){
            if(!array_key_exists($file, $results)){
                $results[$file] = [];
            }
            array_push($results[$file], $k);
        }

        return response()->json($results);
    }
}
