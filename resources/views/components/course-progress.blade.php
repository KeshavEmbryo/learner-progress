<div class="border-l-4 border-blue-500 dark:border-blue-400 pl-4 py-2 bg-gray-50 dark:bg-gray-700 rounded-r pr-2">
    <div class="flex justify-between items-start mb-2">
        <h3 class="font-semibold text-gray-800 dark:text-gray-200 text-sm">
            {{ $course->name }}
        </h3>
        <span class="text-xs font-bold {{ $course->pivot->progress == 100 ? 'text-green-600 dark:text-green-400' : 'text-blue-600 dark:text-blue-400' }}">
            {{ $course->pivot->progress }}%
        </span>
    </div>
    <!-- Progress Bar -->
    <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
        <div class="h-2 rounded-full transition-all {{ $course->pivot->progress == 100 ? 'bg-green-500 dark:bg-green-400' : 'bg-blue-500 dark:bg-blue-400' }}" 
            style="width: {{ $course->pivot->progress }}%">
        </div>
    </div>
</div>