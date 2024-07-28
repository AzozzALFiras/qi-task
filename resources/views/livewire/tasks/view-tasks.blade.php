<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" wire:model="search" placeholder="Search tasks..." class="border border-gray-300 rounded-lg px-4 py-2 w-full">
    </div>

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <!-- Edit Task Form -->
    @if ($editTaskId)
        <div class="mb-4 p-4 border border-gray-300 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">{{ __('Edit Task') }}</h3>
            <input type="text" wire:model="editTaskName" placeholder="Task Name" class="border border-gray-300 rounded-lg px-4 py-2 w-full mb-2" />
            <textarea wire:model="editTaskDescription" placeholder="Task Description" class="border border-gray-300 rounded-lg px-4 py-2 w-full mb-2" rows="3"></textarea>
            <input type="datetime-local" wire:model="editTaskStartTime" class="border border-gray-300 rounded-lg px-4 py-2 w-full mb-2" />
            <input type="datetime-local" wire:model="editTaskEndTime" class="border border-gray-300 rounded-lg px-4 py-2 w-full mb-2" />
            <button wire:click="updateTask" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-lg">
                {{ __('Update Task') }}
            </button>
            <button wire:click="cancelEdit" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded-lg ml-2">
                {{ __('Cancel') }}
            </button>
        </div>
    @endif

    <!-- Task Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Task Name') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Description') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Start Time') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('End Time') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Status') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tasks as $task)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->name }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="truncate">{{ $task->description }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $task->start_time ? \Carbon\Carbon::parse($task->start_time)->format('Y-m-d H:i') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $task->end_time ? \Carbon\Carbon::parse($task->end_time)->format('Y-m-d H:i') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="{{ $task->is_completed ? 'text-green-500' : 'text-yellow-500' }}">
                                {{ $task->is_completed ? 'Completed' : 'Incomplete' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="startEditing({{ $task->id }})" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-lg">
                                {{ __('Edit') }}
                            </button>
                            <button wire:click="markAsComplete({{ $task->id }})" class="ml-2 bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-lg" {{ $task->is_completed ? 'disabled' : '' }}>
                                {{ __('Mark as Complete') }}
                            </button>
                            <button wire:click="markAsIncomplete({{ $task->id }})" class="ml-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-lg" {{ !$task->is_completed ? 'disabled' : '' }}>
                                {{ __('Mark as Incomplete') }}
                            </button>
                            <button wire:click="deleteTask({{ $task->id }})" class="ml-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg">
                                {{ __('Delete') }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
