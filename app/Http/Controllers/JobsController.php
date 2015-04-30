<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    public function index()
    {
    	return Job::all();
    }

    public function store(Request $request, Job $job)
    {
    	$input = $request->only(['name', 'command']);
    	
    	if(!$input['name']) $errors[] = ['type' => 'alert', 'message' => 'Name is required'];
    	if(!$input['command']) $errors[] = ['type' => 'alert', 'message' => 'Command is required'];

    	if(!isset($errors)) {
	 	$job->name = $input['name'];
	 	$job->command = $input['command'];
	    	$success = $job->save();
	    	if(!$success) $errors[] = ['type' => 'alert', 'message' => 'Server error'];
    	}
    	return compact('success', 'errors');
    }

    public function destroy($id)
    {
        $success = Job::find($id)->delete();
        return compact('success');
    }

    public function show($id)
    {
        return Job::find($id);
    }
}