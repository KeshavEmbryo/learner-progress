<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col justify-between">
    <div>
        {{-- Header --}}
        <div class="bg-blue-100 dark:bg-blue-900 p-6">
            <div class="flex items-center space-x-3">
                <x-initials :firstname="$learner->firstname" :lastname="$learner->lastname" />
                <div>
                    <h2 class="text-xl font-semibold text-blue-900 dark:text-blue-100">
                        {{ $learner->firstname }} {{ $learner->lastname }}
                    </h2>
                    <p class="text-blue-700 dark:text-blue-300 text-sm">
                        {{ count($learner->courses) }} {{ Str::plural('course', count($learner->courses)) }} enrolled
                    </p>
                </div>
            </div>
        </div>

        {{-- Courses List --}}
        <div class="p-6">
            @if(count($learner->courses) > 0)
                <div class="space-y-4">
                    @foreach ($learner->courses as $course) 
                        <x-course-progress :course="$course" />
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-sm italic text-center py-4">No courses enrolled</p>
            @endif
        </div>
    </div>

    {{-- Average progress --}}
    @if(count($learner->courses) > 0)
        <div class="bg-purple-50 dark:bg-purple-900/20 px-6 py-4 border-t border-purple-200 dark:border-purple-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-purple-900 dark:text-purple-200">Average Progress</span>
                <span class="text-sm font-bold text-purple-700 dark:text-purple-300">{{ $learner->average_progress }}%</span>
            </div>
            <div class="mt-2 w-full bg-purple-200 dark:bg-purple-800 rounded-full h-2">
                <div class="bg-purple-600 dark:bg-purple-500 h-2 rounded-full transition-all duration-300" style="width: {{ $learner->average_progress }}%"></div>
            </div>
        </div>
    @endif
    
</div>