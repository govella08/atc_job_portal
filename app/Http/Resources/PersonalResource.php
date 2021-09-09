<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalResource extends JsonResource
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
            'sex' => $this->sex,
            'dob' => $this->dob,
            'country_of_residence' => $this->country_of_residence,
            'region' => $this->region,
            'district' => $this->district,
            'marital_status' => $this->marital_status,
            'originality' => $this->originality,
            'disability' => $this->disability,
            'government_employee_status' => $this->government_employee_status,
            'user_id' => $this->user_id
        ];
    }
}