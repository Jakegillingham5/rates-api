<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
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
            'topic_code' => $this->topic_code,
            'topic_name' => $this->topic_name,
            'year' => $this->year,
            'semester' => $this->semester,
            'lecturer' => $this->lecturer->name
        ];
    }
}
