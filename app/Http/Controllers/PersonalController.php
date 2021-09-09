<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonalResource;
use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonalResource::collection(Personal::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sex' => 'required|string',
            'dob' => 'required|date',
            'country_of_residence' => 'required|string',
            'region' => 'required|string',
            'district' => 'required|string',
            'marital_status' => 'required|string',
            'originality' => 'required|string',
            'disability' => 'required|boolean',
            'government_employee_status' => 'required|boolean',
            'user_id' => 'required|integer'
        ]);

        $personal = new Personal();
        $personal->sex = $request->sex;
        $personal->dob = $request->dob;
        $personal->country_of_residence = $request->country_of_residence;
        $personal->region = $request->region;
        $personal->district = $request->district;
        $personal->marital_status = $request->marital_status;
        $personal->originality = $request->originality;
        $personal->disability = $request->disability;
        $personal->government_employee_status = $request->government_employee_status;
        $personal->user_id = $request->user_id;

        if ($personal->save()) {
            return new PersonalResource($personal);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'sex' => 'required|string',
            'dob' => 'required|date',
            'country_of_residence' => 'required|string',
            'region' => 'required|string',
            'district' => 'required|string',
            'marital_status' => 'required|string',
            'originality' => 'required|string',
            'disability' => 'required|boolean',
            'government_employee_status' => 'required|boolean',
            'user_id' => 'required|integer'
        ]);
        
        $personal->sex = $request->sex;
        $personal->dob = $request->dob;
        $personal->country_of_residence = $request->country_of_residence;
        $personal->region = $request->region;
        $personal->district = $request->district;
        $personal->marital_status = $request->marital_status;
        $personal->originality = $request->originality;
        $personal->disability = $request->disability;
        $personal->government_employee_status = $request->government_employee_status;
        $personal->user_id = $request->user_id;

        if ($personal->update()) {
            return new PersonalResource($personal);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        if ($personal->delete()) {
            return new PersonalResource($personal);            
        }
    }
}