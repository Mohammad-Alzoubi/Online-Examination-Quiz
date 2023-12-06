<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    private $limit = 10;
    private $order = 'DESC';
    protected $fillable = ['question', 'quiz_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function storeQuetion($data)
    {
        $data['quiz_id'] = $data['quiz'];
        return Question::create($data);
    }

    public function getQuestion()
    {
        return Question::orderBy('created_at',$this->order)->with('quiz')->paginate($this->limit);
    }

    public function getQuestionById($id)
    {
        return Question::find($id);
    }

    public function FindQuestion($id)
    {
        return Question::find($id);
    }

    public function UpdateQuestion($data, $id)
    {
        $question = Question::find($id);
        $question->question = $data['question'];
        $question->quiz_id  = $data['quiz'];
        $question->save();
        return $question;
    }

    public function deleteQuestion($id)
    {
        return Question::where('id',$id)->delete();
    }
}
