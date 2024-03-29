<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';

    protected $fillable = [
        'user_id',
        'todo',
        'label',
        'done',
    ];

    protected $casts = [
        'done' => 'boolean',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
