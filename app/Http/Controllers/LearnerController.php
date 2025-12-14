<?php

namespace App\Http\Controllers;

use App\Actions\GetFilteredLearnersAction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class LearnerController extends Controller
{
    public function index(
        Request $request, 
        GetFilteredLearnersAction $action
    ): View {
        $learners = $action->run(
            $request->input('search'), 
            $request->input('sort', 'desc')
        );

        return view('learner-progress', [
            'learners' => $learners,
        ]);
    }
}
