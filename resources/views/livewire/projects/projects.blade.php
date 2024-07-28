<!-- resources/views/livewire/projects/projects.blade.php -->
@php
use App\Models\Task;
@endphp
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="bg-green-50 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-md mb-4">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill text-green-600" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <span>{{ session('message') }}</span>
                <button type="button" wire:click="$set('message', null)" class="ml-auto text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Create New Project Button -->
    <button wire:click="create()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg mb-6 transition duration-200 ease-in-out">
        {{ __('Create New Project') }}
    </button>

    <!-- Create/Edit Project Modal -->
    @if($isOpen)
        @include('livewire.projects.create')
    @endif

    <!-- Projects Card Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                <a wire:navigate href="{{ route('tasks.view', $project->id) }}">
                {{ $project->name }}
                </a>
            </h2>
            <p class="text-gray-600 mb-4">{{ $project->description }}</p>
            <p class="space-x-4 py-2">
                <!-- Completed Tasks Count -->
                <span class="bg-green-800 text-white font-semibold py-1 px-3 rounded">
                    {{ Task::completedCount($project->id) }}
                </span>
            
                <!-- Not Completed Tasks Count -->
                <span class="bg-orange-800 text-white font-semibold py-1 px-3 rounded">
                   {{ Task::totalCount($project->id) - Task::completedCount($project->id) }}
                </span>

                <!-- Total Tasks End time without Completed Count -->
                <span class="bg-red-800 text-white font-semibold py-1 px-3 rounded">
                    {{ Task::getTasksEndingAfter($project->id, now()) }}
                </span>
                
            
                <!-- Total Tasks Count -->
                <span class="bg-gray-800 text-white font-semibold py-1 px-3 rounded">
                  {{ Task::totalCount($project->id) }}
                </span>
            </p>
            
            <div class="flex justify-between items-center">
                <button wire:click="openTasksModal({{ $project->id }})" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg">
                    {{ __('Manage Tasks') }} ({{ $project->tasks->count() }})
                </button>
                <div class="flex space-x-2">
                    <button wire:click="edit({{ $project->id }})" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-150 ease-in-out">
                        {{ __('Edit') }}
                    </button>
                    <button wire:click="delete({{ $project->id }})" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-150 ease-in-out">
                        {{ __('Delete') }}
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Task Management View -->
    @if($isTasksOpen)
    @include('livewire.tasks.tasks', [
        'tasks' => $selectedProject->tasks,
        'newTaskName' => '',
        'isTaskModalOpen' => true
    ])
@endif

</div>
