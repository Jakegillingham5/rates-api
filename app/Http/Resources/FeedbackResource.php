<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
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
            'rating' => $this->rating,
            'feedback' => $this->feedback,
            'response' => $this->response,
            'review_time' => $this->review_time,
            'is_anonymous' => $this->is_anonymous
        ];
    }
}
