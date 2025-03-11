<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ab', function () {
    return "about page shoud be returned haha";
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/content', function(){
    return view('cont');
});

Route::get('/jobs', function(){
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function($id){
    $job = Job::find($id); 

    return view('job', ['job' => $job]);
});