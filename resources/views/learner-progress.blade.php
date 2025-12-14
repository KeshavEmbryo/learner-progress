<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Learner Progress</h1>
            <p class="text-gray-600 mt-2">Track student enrollment and course completion</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($learners as $learner) 
                <x-learner-card :learner="$learner" />
            @endforeach
        </div>

        @if(count($learners) === 0)
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">📚</div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Learners Found</h3>
                <p class="text-gray-500">Start by adding learners to track their progress</p>
            </div>
        @endif
    </div>
</x-layout>