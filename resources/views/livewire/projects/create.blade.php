<!-- resources/views/livewire/create.blade.php -->

<div class="fixed inset-0 flex items-center justify-center z-50">
     <!-- Background Blur Effect -->
     <div class="absolute inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm z-0"></div>
 
     <!-- Modal Container -->
     <div class="relative bg-white w-100 max-w-lg mx-auto rounded-lg shadow-lg p-6 z-10">
         <!-- Modal Header -->
         <div class="flex justify-between items-center mb-4">
             <h2 class="text-2xl font-semibold text-gray-900">
                 {{ $project_id ? 'Edit Project' : 'Create New Project' }}
             </h2>
             <button wire:click="closeModal()" class="text-gray-600 hover:text-gray-800">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                  </svg>
             </button>
         </div>
 
         <!-- Form -->
         <form wire:submit.prevent="store">
             <div class="mb-6">
                 <label for="name" class="block text-gray-800 text-sm font-medium mb-2"> {{ __('Name') }} </label>
                 <input type="text" id="name" wire:model="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                 @error('name') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
             </div>
             <div class="mb-6">
                 <label for="description" class="block text-gray-800 text-sm font-medium mb-2">{{ __('Description') }}</label>
                 <textarea id="description" wire:model="description" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                 @error('description') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
             </div>
             <div class="flex justify-end">
                 <button type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-md transition duration-150 ease-in-out">
                     {{ $project_id ? 'Update' : 'Save' }}
                 </button>
             </div>
         </form>
     </div>
 </div>
 