<!-- Task Management Modal -->
@if($isTaskModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold mb-4"> {{ __('Add New Task') }} </h3>
            
            <!-- Task Name -->
            <input type="text" wire:model="newTaskName" class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full" placeholder="Task name">
            @error('newTaskName') <span class="text-red-500">{{ $message }}</span> @enderror
            
            <!-- Task Description -->
            <textarea wire:model="newTaskDescription" class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full" placeholder="Task description"></textarea>
            @error('newTaskDescription') <span class="text-red-500">{{ $message }}</span> @enderror

            <!-- Start Time -->
            <input type="datetime-local" wire:model="newTaskStartTime" class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full">
            @error('newTaskStartTime') <span class="text-red-500">{{ $message }}</span> @enderror

            <!-- End Time -->
            <input type="datetime-local" wire:model="newTaskEndTime" class="border border-gray-300 rounded-lg px-3 py-2 mb-4 w-full">
            @error('newTaskEndTime') <span class="text-red-500">{{ $message }}</span> @enderror

            <div class="flex justify-end">
                <button wire:click="addTask()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg">
                    {{ __('Add Task') }}
                </button>
                <button wire:click="closeTasksModal" class="ml-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg">
                    {{ __('Cancel') }}
                </button>
            </div>
        </div>
    </div>
@endif

<!-- Task List -->
<div class="mt-6">
    <h3 class="text-xl font-semibold mb-4">{{ __('Tasks') }} ({{ $tasks->count() }})</h3>
    <ul>
        @foreach($tasks as $task)
            <li class="mb-2">
                <span class="{{ $task->completed ? 'line-through' : '' }}">{{ $task->name }}</span>
                <p class="text-gray-600 text-sm">{{ $task->description }}</p>
                <p class="text-gray-600 text-xs">{{ __('Start:') }} {{ $task->start_time ? $task->start_time : 'N/A' }}</p>
                <p class="text-gray-600 text-xs">{{ __('End:') }} {{ $task->end_time ? $task->end_time : 'N/A' }}</p>
                <button wire:click="markAsComplete({{ $task->id }})" class="ml-2 bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-lg" {{ $task->completed ? 'disabled' : '' }}>
                    {{ __('Mark as Complete') }}
                </button>
                <button wire:click="markAsIncomplete({{ $task->id }})" class="ml-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-lg" {{ !$task->completed ? 'disabled' : '' }}>
                    {{ __('Mark as Incomplete') }}
                </button>
            </li>
        @endforeach
    </ul>
</div>
