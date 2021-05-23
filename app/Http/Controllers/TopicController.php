<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Topic;
use App\Http\Resources\TopicResource;

class TopicController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Topic $topic)
    {
        return response()->json([new TopicResource($topic)]);
    }
}
