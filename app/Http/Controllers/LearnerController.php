<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $learners = Learner::query()
            ->with('courses')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('courses', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                });
            })
            ->get()
            ->map(function ($learner) {
                $learner->average_progress = $learner->courses->count() > 0 
                    ? round($learner->courses->sum('pivot.progress') / $learner->courses->count())
                    : 0;
                return $learner;
            });

        return view('learner-progress', ['learners' => $learners]);
    }
}
