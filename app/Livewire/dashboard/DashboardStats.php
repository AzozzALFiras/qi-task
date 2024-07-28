<?php

namespace App\Livewire\dashboard;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Models\projects\Project;

class DashboardStats extends Component
{
    public $totalProjects;
    public $totalTasks;
    public $pendingTasks;
    public $completedTasks;
    public $admins;
    public $users;

    public function mount()
    {
        $this->totalProjects = Project::count();
        $this->totalTasks = Task::count();
        $this->pendingTasks = Task::where('is_completed', 0)->count();
        $this->completedTasks = Task::where('is_completed', 1)->count();
        $this->admins = User::where('isAdmin', true)->count();
        $this->users = User::where('isAdmin', false)->count();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-stats');
    }
}
