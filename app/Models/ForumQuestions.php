<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'kelas_id',
        'questions_detail',
        'image',
        'likes',
        'created_at',
        'updated_at',
    ];


    protected $table = 'forum_questions';

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function answers() {
        return $this->hasMany(ForumAnswers::class, 'question_id');
    }



}


 