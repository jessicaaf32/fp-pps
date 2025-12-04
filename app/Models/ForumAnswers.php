<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'question_id',
        'user_id',
        'answer_detail',
        'likes',
        'created_at',
        'updated_at',
    ];


    protected $table = 'forum_answers';
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question() {
        return $this->belongsTo(ForumQuestions::class, 'question_id');
    }



}
 