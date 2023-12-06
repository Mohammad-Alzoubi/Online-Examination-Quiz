<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{

    public function create()
    {
        return view('backend.exam.assign');
    }

    public function assignExam(Request $request)
    {
        //users
        $data = $this->validateForm($request);
        $quiz = (new Quiz)->assignExam($data);
        return redirect()->back()->with('message', 'Exam assigned to user successfully!');
    }

    public function userExam()
    {
        $quizzes = (new Quiz)->allQuiz();
        return view('backend.exam.index', compact('quizzes'));
    }

    public function removeExam(Request $request)
    {
        $userId = $request->user_id;
        $quizId = $request->quiz_id;
        $quiz   = Quiz::find($quizId);

        $result = Result::where('quiz_id', $quizId)->where('user_id', $userId)->exists();
        if ($result){
            return redirect()->back()->with('message', 'This quiz is played by user so it can not be removed!');
        } else {
            $quiz->users()->detach($userId);
            return redirect()->back()->with('message', 'Exam is now not assigned to that user!');
        }

    }

//    getQuiz and Questions to user
    public function getQuizQuestions(Request $request, $quizId)
    {
        $authUser = auth()->user()->id;

        //check if user has been assigned a particular quiz
        $userId = DB::table('quiz_user')->where('user_id', $authUser)->pluck('quiz_id')->toArray();
        if (!in_array($quizId, $userId)){
            return redirect()->to('/home')->with('error', 'You are not assigned this Exam!');
        }

        //has user played particular quiz
        $wasCompleted = Result::where('user_id', $authUser)->whereIn('quiz_id', (new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
        if (in_array($quizId, $wasCompleted)){
            return redirect()->to('/home')->with('error', 'You already participant in this exam!');
        }

        $quiz          = Quiz::find($quizId);
        $time          = Quiz::where('id', $quizId)->value('minutes');
        $quizQuestions = Question::where('quiz_id', $quizId)->with('answers')->get();
        $authUserHasPlayedQuiz = Result::where(['user_id'=>$authUser],['quiz_id'=>$quizId])->get();



        return view('quiz', compact('quiz', 'time', 'quizQuestions', 'authUserHasPlayedQuiz'));
    }


    public function postQuiz(Request $request)
    {
        $questionId = $request->questionId;
        $answerId   = $request->answerId;
        $quizId     = $request->quizId;
        $authUser   = auth()->user();
        return $userQuestionAnswer = Result::updateOrCreate(
            ['user_id'=>$authUser->id, 'quiz_id'=>$quizId, 'question_id'=>$questionId],
            ['answer_id'=>$answerId]
        );
    }

    public function viewResult($userId,$quizId)
    {
        $results = Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
//        return $results[1]->answer;
        return view('result-details', compact('results'));
    }

    public function result()
    {
        $quizzes = Quiz::get();
        return view('backend.result.index', compact('quizzes'));
    }

    public function userQuizResult($userId, $quizId)
    {
        $results = Result::where('user_id', $userId)->where('quiz_id', $quizId)->get();
        $totalQuestions  = Question::where('quiz_id', $quizId)->count();
        $attemptQuestion = Result::where('user_id', $userId)->where('quiz_id', $quizId)->count();
        $quiz = Quiz::where('id', $quizId)->get();

        $ans = [];
        foreach($results as $answer){
            array_push($ans, $answer->answer_id);
        }
        $userCorrectedAnswer = Answer::WhereIn('id', $ans)->where('is_correct', 1)->count();
        $userWrongAnswer     = $totalQuestions - $userCorrectedAnswer;
        if ($attemptQuestion){
            $percentage = ($userCorrectedAnswer / $totalQuestions) * 100;
        }else{
            $percentage = 0;
        }

        return view('backend.result.result', compact('results', 'quiz', 'totalQuestions', 'attemptQuestion', 'userCorrectedAnswer', 'userWrongAnswer', 'percentage'));


    }




    public function validateForm($request)
    {
        return $this->validate($request,[
            'quiz_id' => 'required',
            'user_id' => 'required'
        ]);
    }

}
