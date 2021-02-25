<?php

namespace Vocalogenesis\Testmodule\Controllers;

use Vocalogenesis\Testmodule\Models\Tests;
use Vocalogenesis\Testmodule\Models\TestsAnswers;
use Vocalogenesis\Testmodule\Models\TestsUseranswers;
use Vocalogenesis\Testmodule\Models\TestsQuestions;
use Vocalogenesis\Testmodule\Models\TestsObjects;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestmoduleController extends Controller
{
    public function checkGuest()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
    }
    public function index(){
        $this->checkGuest();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        return view('testmodule::home', compact(['objects', 'tests']));
    }
    public function createTest(){

        $this->checkGuest();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        return view('testmodule::create_test', compact(['objects', 'tests']));
    }

    public function createTestSubmit(Request $request){

        $this->checkGuest();
        $test = new Tests;
        $test->name = $request->name;
        $test->description = $request->description;
        $test->objectID = $request->objectID;
        $test->save();
        for($q = 0; $q < $request->qty; $q++)
        {
            $question = new TestsQuestions;
            $question->name = $request->question[$q+1];
            $question->testID = $test->id;
            $question->save();
            for($i = 0; $i < 4; $i++)
            {
                if($i == 0)
                {
                    $answers = new TestsAnswers;
                    $answers->name = $request->answer[$q+1][$i+1];
                    $answers->questionID = $question->id;
                    $answers->correct = 1;
                    $answers->testID = $test->id;
                    $answers->save();
                } else {
                    $answers = new TestsAnswers;
                    $answers->name = $request->answer[$q+1][$i+1];
                    $answers->questionID = $question->id;
                    $answers->testID = $test->id;
                    $answers->save();
                }
            }
        }
        
        return redirect(route('testmoduleIndex'));
    }

    public function createObject(){

        $this->checkGuest();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        return view('testmodule::create_object', compact(['objects', 'tests']));
    }
    public function createObjectSubmit(Request $request){

        $this->checkGuest();
        $object = new TestsObjects;
        $object->name = $request->name;
        $object->kurs = $request->kurs;
        $object->save();

        return redirect(route('testmoduleIndex'));
    }
    public function previewTest($id){
        $this->checkGuest();
        if (TestsUseranswers::where('testID', '=', $id)->count() > 0)
        {
            return redirect(route('testmoduleResult', ['id' => $id]));
        }
        $test = Tests::find($id)->toArray();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        $questions = TestsQuestions::where('testID', '=', $id)->get();
        $totalQ = count($questions);
        return view('testmodule::preview_test', compact(['objects', 'tests', 'test', 'totalQ']));
    }
    public function startTest($id, Request $request){
        $this->checkGuest();
        if ($request->useranswers) {
            foreach($request->useranswers as $useranswer){
                $useranswers = new TestsUseranswers;
                $useranswers->userID = Auth::id();
                $useranswers->answerID = $useranswer;
                $useranswers->testID = $id;
                $useranswers->save();
            }
            return redirect(route('testmoduleResult', ['id' => $id]));
        } else {
            $answers = TestsAnswers::where('tests_answers.testID', '=', $id)
            ->inRandomOrder()
            ->get()
            ->toArray();

            $questions = TestsQuestions::where('testID', '=', $id)
            ->get()
            ->toArray();
            foreach($questions as $key => $value1) {
                foreach($answers as $value2) {
                    if($value2['questionID'] === $value1['id']){
                        $questions[$key]['answers'][$value2['id']] = $value2['name'];
                    }   
                }
            }
            $tests = Tests::all()->toArray();
            $objects = TestsObjects::all()->toArray();
            return view('testmodule::questions', compact(['objects', 'tests', 'questions', 'answers']));
        }
    }
    public function resultTest($id){
        $this->checkGuest();
        $useranswers = TestsUseranswers::where(['userID' => Auth::id(), 'tests_useranswers.testID' => $id])
        ->join('tests_answers', 'tests_useranswers.answerID', '=', 'tests_answers.id')
        ->get()
        ->toArray();
        $rightanswer = 0;
        $test = Tests::where('id', '=', $id)->get()->toArray();
        foreach($useranswers as $value)
        {
            if ($value['correct'])
            {
                $rightanswer++;
            }
        }
        $countq = TestsQuestions::where('testID', '=', $id)->count();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        return view('testmodule::results', compact(['objects', 'tests', 'useranswers', 'countq', 'rightanswer', 'test']));
    }
    public function sortedTest($object)
    {
        $testsSort = Tests::where('objectID', '=', $object)->get()->toArray();
        $tests = Tests::all()->toArray();
        $object = TestsObjects::find($object)->get()->toArray();
        $objects = TestsObjects::all()->toArray();
        return view('testmodule::home', compact(['objects', 'tests', 'testsSort', 'object']));
    }
    public function removeTest($id)
    {
        Tests::find($id)->delete();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        return redirect(route('testmoduleResult', ['id' => $id]));
    }
    public function removeObj($id)
    {
        TestsObjects::find($id)->delete();
        $tests = Tests::all()->toArray();
        $objects = TestsObjects::all()->toArray();
        return redirect(route('testmoduleResult', ['id' => $id]));
    }
}
