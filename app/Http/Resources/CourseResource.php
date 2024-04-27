<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'teacher_id' => $this->teacher_id,
            'duration' => $this->duration,
            'lectures' => $this->lectures,
            'quizzes' => $this->quizzes,
            'people_enrolled' => $this->people_enrolled,
            'price' => $this->price,
            'image' => $this->image,
            'images' => $this->images,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // Add more fields as needed
        ];
    }
}
