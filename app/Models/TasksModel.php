<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksModel extends Model
{
    use HasFactory;

     protected $table = 'tasks';

     protected $fillable = ['body',
                            'header',
                            'summary',
                            'format',
                            'pages',
                            'level',
                            'paperType',
                            'studentprice',
                            'tutorprice',
                            'studentId',
                            'questionId',
                            'deadline',
                            'created_at'

                        ];
}