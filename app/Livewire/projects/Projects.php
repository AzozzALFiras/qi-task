<?php

namespace App\Livewire\projects;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\projects\Project;
use Illuminate\Support\Facades\Gate;

class Projects extends Component
{
    public $projects, $name, $description, $project_id;
    // Add these properties to your Livewire component
    public $newTaskName, $newTaskDescription, $newTaskStartTime, $newTaskEndTime, $task_id;
    public $isOpen = 0;
    public $isTasksOpen = 0;
    public $selectedProject;

    public function render()
    {
        $this->projects = Project::all();
        return view('livewire.projects.projects');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->project_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Project::updateOrCreate(['id' => $this->project_id], [
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id()
        ]);

        session()->flash('message',
            $this->project_id ? 'Project Updated Successfully.' : 'Project Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->project_id = $id;
        $this->name = $project->name;
        $this->description = $project->description;

        $this->openModal();
    }

    public function delete($id)
    {
        Project::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }

    public function openTasksModal($projectId)
    {
        $this->selectedProject = Project::find($projectId);
        $this->isTasksOpen = true;
    }

    public function closeTasksModal()
    {
        $this->isTasksOpen = false;
        $this->selectedProject = null;
    }

    public function addTask()
    {
        // Validate input fields for adding a task
        $this->validate([
            'newTaskName' => 'required|string|max:255',
            'newTaskDescription' => 'nullable|string',
            'newTaskStartTime' => 'nullable|date',
            'newTaskEndTime' => 'nullable|date|after_or_equal:newTaskStartTime',
        ]);

        // Check if the user is allowed to create a task
        if (Gate::denies('create', Task::class)) {
            session()->flash('error', 'You are not authorized to create a task.');
            return;
        }

        // Create or update the task
        Task::updateOrCreate(
            ['id' => $this->task_id ?? null], // Use task_id if it's set, otherwise null for create
            [
                'name' => $this->newTaskName,
                'description' => $this->newTaskDescription,
                'start_time' => $this->newTaskStartTime,
                'end_time' => $this->newTaskEndTime,
                'project_id' => $this->selectedProject->id,
                'user_id' => auth()->id()
            ]
        );

        session()->flash('message', $this->task_id ? 'Task Updated Successfully.' : 'Task Created Successfully.');

        // Close the modal and reset fields
        $this->closeTasksModal();
        $this->resetInputFieldsTasks();
    }
    
    private function resetInputFieldsTasks()
    {
        $this->newTaskName = '';
        $this->newTaskDescription = '';
        $this->newTaskStartTime = '';
        $this->newTaskEndTime = '';
        $this->task_id = null; // Ensure this is reset
    }
    
    
}
