<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    // protected $fillable=[
    //     'title',
    //     'description',
    //     'is_completed'
            // 'user_id'

    // ];
    protected $guarded=[
        'id'
    ];
    

    protected $table = 'tasks';


    public function user ()
    {
        return $this->belongsTo(User::class);

    }
}
