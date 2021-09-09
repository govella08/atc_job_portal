<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'number_of_posts' => $this->number_of_posts,
            'description' => $this->description,
            'qualification' => $this->qualification,
            'category_id' => $this->category_id,
            'employer_id' => $this->employer_id,
            'posted_on' => $this->posted_on,
            'deadline' => $this->deadline,
            'salary_scale' => $this->salary_scale,
            'file_path' => $this->file_path,
        ];
    }
}