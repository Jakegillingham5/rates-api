<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Resources\Json\JsonResource;

class AssessmentCollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'feedback_id' => $this->feedback->where('student_id', $request->user()->id)->first() !== null
                ? $this->feedback->where('student_id', $request->user()->id)->first()->id
                : -1
        ];
    }
}
