<?php

namespace App\Models\projects;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'user_id'];


    // app/Models/Project.php
public function tasks()
{
    return $this->hasMany(Task::class);
}

}
