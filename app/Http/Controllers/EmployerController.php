<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployerResource;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer = Employer::all();
        return EmployerResource::collection($employer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employer = new Employer();
        $employer->name = $request->name;
        $employer->description = $request->description;

        if ($employer->save()) {
            return new EmployerResource($employer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        return new EmployerResource($employer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        $employer->name = $request->name;
        $employer->description = $request->description;

        if ($employer->update()) {
            return new EmployerResource($employer);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        if ($employer->delete()) {
            return new EmployerResource($employer);
        }
    }
}
