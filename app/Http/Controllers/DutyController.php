<?php

namespace App\Http\Controllers;

use App\Http\Resources\DutyResource;
use App\Models\Duty;
use Illuminate\Http\Request;

class DutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DutyResource::collection(Duty::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duty = new Duty();
        $duty->name = $request->name;

        if ($duty->save()) {
            return new DutyResource($duty);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function show(Duty $duty)
    {
        return new DutyResource($duty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duty $duty)
    {
        $duty->name = $request->name;

        if ($duty->update()) {
            return new DutyResource($duty);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duty $duty)
    {
        if ($duty->delete()) {
            return new DutyResource($duty);
        }
    }
}
