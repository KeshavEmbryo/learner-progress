<div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <!-- Learner Header -->
    <div class="bg-blue-100 p-6">
        <div class="flex items-center space-x-3">
            <x-initials :firstname="$learner->firstname" :lastname="$learner->lastname" />
            <div>
                <h2 class="text-xl font-semibold text-blue-900">
                    {{ $learner->firstname }} {{ $learner->lastname }}
                </h2>
                <p class="text-blue-700 text-sm">
                    {{ count($learner->courses) }} {{ Str::plural('course', count($learner->courses)) }} enrolled
                </p>
            </div>
        </div>
    </div>

    <!-- Courses List -->
    <div class="p-6">
        @if(count($learner->courses) > 0)
            <div class="space-y-4">
                @foreach ($learner->courses as $course) 
                    <x-course-progress :course="$course" />
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-sm italic text-center py-4">No courses enrolled</p>
        @endif
    </div>
</div>