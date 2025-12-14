<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
    public function index()
    {
        $learners = Learner::query()
            ->with('courses')
            ->get();

        return view('learner-progress', ['learners' => $learners]);
    }
}
