<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-6">{{ __("Statistics") }}</h1>

                <!-- Statistics Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Projects -->
                    <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-blue-800">{{ __('Total Projects') }}</h3>
                        <p class="text-2xl font-bold text-blue-600">{{ $totalProjects }}</p>
                    </div>

                    <!-- Total Tasks -->
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800">{{ __('Total Tasks') }}</h3>
                        <p class="text-2xl font-bold text-gray-600">{{ $totalTasks }}</p>
                    </div>

                    <!-- Pending Tasks -->
                    <div class="bg-yellow-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-yellow-800">{{ __('Pending Tasks') }}</h3>
                        <p class="text-2xl font-bold text-yellow-600">{{ $pendingTasks }}</p>
                    </div>

                    <!-- Completed Tasks -->
                    <div class="bg-green-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-green-800">{{ __('Completed Tasks') }}</h3>
                        <p class="text-2xl font-bold text-green-600">{{ $completedTasks }}</p>
                    </div>

                    <!-- Admins -->
                    <div class="bg-purple-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-purple-800">{{ __('Admins') }}</h3>
                        <p class="text-2xl font-bold text-purple-600">{{ $admins }}</p>
                    </div>

                    <!-- Users -->
                    <div class="bg-pink-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-pink-800">{{ __('Users') }}</h3>
                        <p class="text-2xl font-bold text-pink-600">{{ $users }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
