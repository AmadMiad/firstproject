<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->simplePaginate(8);
    
            return view('jobs.index', [
                'jobs' => $jobs
            ]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }

    public function store(){
        request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'regex:/^\d{1,3}(,\d{3})*\s?(USD|usd|iqd|IQD)$/'],
        ], [
        'salary.regex' => 'The salary must be a valid amount followed by a currency (e.g., 1,200 USD or 1,200 IQD).',
        'salary.required' => 'The salary field is required.',
        ]);


        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 3
            
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job){
            return view('jobs.edit', ['job' => $job]);
        }

    public function update(Job $job){
        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        //authorize

        //update

        $job->update([
            'title' => request('title'),
            'salary'=> request('salary'),
        ]);

        //redirect
        return redirect('jobs/'.$job->id);
    }

    public function destroy(Job $job){
            //deletep
            $job->delete();
            //redirect
            return redirect('/jobs');
    }

}
