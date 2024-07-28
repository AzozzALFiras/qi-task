<?php
namespace App\Livewire\tasks;

use App\Models\Task;
use Livewire\Component;

class ViewTasks extends Component
{
    public $tasks = [];
    public $search = ''; // Property for search
  
    public $editTaskEndTime, $editTaskStartTime, $editTaskDescription, $editTaskName, $editTaskId, $projectId;

    public function mount($id)
    {
        $this->projectId = $id;
        $this->loadTasks();
    }


    public function updatedSearch()
    {
    $this->loadTasks(); // Reload tasks when search query changes
    }
    public function loadTasks()
    {
    $query = Task::where('project_id', $this->projectId)
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%'); // Include description if needed
        });
    $this->tasks = $query->get();
}



    public function markAsComplete($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->is_completed = 1; // Mark as complete
            $task->save();
            $this->loadTasks(); // Refresh task list after updating
            session()->flash('message', 'Task marked as complete.');
        }
    }

    public function markAsIncomplete($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->is_completed = 0; // Mark as incomplete
            $task->save();
            $this->loadTasks(); // Refresh task list after updating
            session()->flash('message', 'Task marked as incomplete.');
        }
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->delete();
            $this->loadTasks(); // Refresh task list after deletion
            session()->flash('message', 'Task deleted successfully.');
        }
    }

    public function startEditing($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $this->editTaskId = $taskId;
            $this->editTaskName = $task->name;
            $this->editTaskDescription = $task->description;
            $this->editTaskStartTime = $task->start_time;
            $this->editTaskEndTime = $task->end_time;
        }
    }

    public function updateTask()
    {
        $task = Task::find($this->editTaskId);
        if ($task) {
            $task->name = $this->editTaskName;
            $task->description = $this->editTaskDescription;
            $task->start_time = $this->editTaskStartTime;
            $task->end_time = $this->editTaskEndTime;
            $task->save();
            $this->loadTasks(); // Refresh task list after updating
            session()->flash('message', 'Task updated successfully.');
            $this->cancelEdit();
        }
    }

    public function cancelEdit()
    {
        $this->editTaskId = null;
        $this->editTaskName = '';
        $this->editTaskDescription = '';
        $this->editTaskStartTime = null;
        $this->editTaskEndTime = null;
    }

    public function render()
    {
        return view('livewire.tasks.view-tasks');
    }
   
}
