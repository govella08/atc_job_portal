<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobResource::collection(Job::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'number_of_posts' => 'required|integer',
            'description' => 'required|string',
            'qualification' => 'required|string',
            'category_id' => 'integer',
            'employer_id' => 'integer',
            'posted_on' => 'date',
            'deadline' => 'date',
            'salary_scale' => 'required|string',
            'file_path' => 'required|string'
        ]);

        $job = new Job();
        $job->title = $data['title'];
        $job->number_of_posts = $data['number_of_posts'];
        $job->description = $data['description'];
        $job->qualification = $data['qualification'];
        $job->category_id = $data['category_id'];
        $job->employer_id = $data['employer_id'];
        $job->posted_on = $data['posted_on'];
        $job->deadline = $data['deadline'];
        $job->salary_scale = $data['salary_scale'];
        $job->file_path = $data['file_path'];

        if ($job->save()) {
            return new JobResource($job);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return new JobResource($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'number_of_posts' => 'required|integer',
            'description' => 'required|string',
            'qualification' => 'required|string',
            'category_id' => 'integer',
            'employer_id' => 'integer',
            'posted_on' => 'date',
            'deadline' => 'date',
            'salary_scale' => 'required|string',
            'file_path' => 'required|string'
        ]);

        $job->title = $data['title'];
        $job->number_of_posts = $data['number_of_posts'];
        $job->description = $data['description'];
        $job->qualification = $data['qualification'];
        $job->category_id = $data['category_id'];
        $job->employer_id = $data['employer_id'];
        $job->posted_on = $data['posted_on'];
        $job->deadline = $data['deadline'];
        $job->salary_scale = $data['salary_scale'];
        $job->file_path = $data['file_path'];

        if ($job->update()) {
            return new JobResource($job);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        if ($job->delete()) {
            return new JobResource($job);
        }
    }

    public function search(Request $request)
    {
        $jobs = Job::where('title', 'like', '%'.$request->title.'%')->get();
        return JobResource::collection($jobs);
    }
}