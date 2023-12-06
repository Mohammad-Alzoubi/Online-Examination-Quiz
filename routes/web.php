<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'register' =>false,
    'reset'    =>false,
    'verify'   =>false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('user/quiz/{quiz_id}',                [ExamController::class, 'getQuizQuestions'])->middleware('auth');
Route::post('quiz/create',                       [ExamController::class, 'postQuiz'])->middleware('auth');
Route::get('result/user/{userId}/quiz/{quizId}', [ExamController::class, 'viewResult'])->middleware('auth');






Route::group(['middleware'=>'isAdmin'], function (){

    Route::get('/', function () {
        return view('admin.index');
    });

    //Resource Quiz
    Route::resource('quiz',QuizController::class);

    //Resource Question
    Route::resource('question',QuestionController::class);

    //Resource User
    Route::resource('user',UserController::class);

    Route::get('/quiz/{id}/question',[QuizController::class, 'question'])->name('quiz.question');

    //Resource Exam
    Route::get('exam/assign',  [ExamController::class, 'create'])->name('user.exam');
    Route::post('exam/assign', [ExamController::class, 'assignExam'])->name('exam.assign');
    Route::get('exam/user',    [ExamController::class, 'userExam'])->name('view.exam');
    Route::post('exam/remove', [ExamController::class, 'removeExam'])->name('exam.remove');

    // View Result
    Route::get('result',                   [ExamController::class, 'result'])->name('result');
    Route::get('result/{userId}/{quizId}', [ExamController::class, 'userQuizResult']);

});




Route::get('/index2', function () {
    return view('admin.index2');
});





//Route::get('/test', function () {
//    $value = config('app.timezone');
//    echo $value .'<br>';
//
////    echo config('app.timezone', 'America/Chicago') . '<br>';
////
//    config(['app.timezone' => 'Asia/Amman']) . '<br>';
//
//    echo date("H:i:s");
//
//});
