<?php

namespace App\Livewire\tasks;

use App\Models\Task;
use App\Models\Project;
use Livewire\Component;

class Tasks extends Component
{
    public $project;
    public $tasks;
    public $newTaskName;
    public $isTaskModalOpen = false;

    protected $rules = [
        'newTaskName' => 'required|string|max:255',
    ];

    public function mount($project)
    {
        $this->project = $project;
        $this->tasks = $this->project->tasks; // Load initial tasks
    }

    public function openTaskModal()
    {
        $this->isTaskModalOpen = true;
    }

    public function closeTaskModal()
    {
        $this->isTaskModalOpen = false;
    }

    public function addTask()
    {
        $this->validate();

        $this->project->tasks()->create([
            'name' => $this->newTaskName,
        ]);

        $this->newTaskName = '';
        $this->tasks = $this->project->tasks; // Refresh tasks
        $this->closeTaskModal(); // Close modal after adding
        session()->flash('message', 'Task added successfully!');
    }

    public function markAsComplete($taskId)
    {
        $task = $this->project->tasks()->find($taskId);
        if ($task) {
            $task->update(['completed' => true]);
            $this->tasks = $this->project->tasks; // Refresh tasks
            session()->flash('message', 'Task marked as complete!');
        }
    }

    public function markAsIncomplete($taskId)
    {
        $task = $this->project->tasks()->find($taskId);
        if ($task) {
            $task->update(['completed' => false]);
            $this->tasks = $this->project->tasks; // Refresh tasks
            session()->flash('message', 'Task marked as incomplete!');
        }
    }

    public function render()
    {
        return view('livewire.tasks.tasks');
    }
}
