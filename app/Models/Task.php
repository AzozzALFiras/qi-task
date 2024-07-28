<?php


namespace App\Models;

use App\Models\projects\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'is_completed',
        'project_id'
    ];

    // Define the relationship with Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public static function completedCount($id)
    {
        return Self::where('is_completed', true)->where('project_id', $id)->count();

    }
    public static function isNotCompleted($id)
    {
        return Self::where('is_completed', false)->where('project_id', $id)->count();

    }
    public static function totalCount($id)
    {
        return Self::where('project_id', $id)->count(); 

    }

    public static function getTasksEndingAfter($projectId, $date){
        return Self::where('project_id', $projectId)
                   ->where('end_time', '>', $date)
                   ->where('is_completed', false)
                   ->count();
    }
    

}
