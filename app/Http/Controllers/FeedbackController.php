<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Resources\FeedbackResource;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Feedback $feedback)
    {
        return response()->json([new FeedbackResource($feedback)]);
    }

    /**
     * Create the specified resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Feedback::create([
            'rating' => $request->input('rating'),
            'feedback' => $request->input('message'),
            'is_anonymous' => $request->input('is_anonymous'),
            'student_id' => $request->user()->id,
            'assessment_id' => $request->input('assessment_id')
        ]);
        return response(null, 200);
    }
}
