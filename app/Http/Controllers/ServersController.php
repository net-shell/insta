<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Contracts\SSH;

class ServersController extends Controller
{
    public function index()
    {
    	return Server::withTrashed()->orderBy('deleted_at', 'asc')->get();
    }

    public function store(Request $request, Server $server)
    {
    	$input = $request->only(['name', 'host', 'port', 'user', 'password']);
    	
    	if(!$input['name']) $errors[] = ['type' => 'alert', 'message' => 'Name is required'];
    	if(!$input['host']) $errors[] = ['type' => 'alert', 'message' => 'Host is required'];
    	if(!$input['user']) $errors[] = ['type' => 'alert', 'message' => 'User is required'];

    	if(!isset($errors)) {
	 	$server->name = $input['name'];
	 	$server->credentials = json_encode(compact('host', 'port', 'user', 'password'));
	 	$server->user_id = app('auth')->id();
	    	$success = $server->save();
	    	if(!$success) $errors[] = ['type' => 'alert', 'message' => 'Server error'];
    	}
    	return compact('success', 'errors', 'input');
    }

    public function destroy($id)
    {
        $success = Server::find($id)->delete();
        return compact('success');
    }

    public function show($id)
    {
        $server = Server::find($id);
        return $server;
    }

    public function test(Request $request, SSH $ssh)
    {
    	$input = $request->only('host', 'port', 'user', 'password');
    	try {
    		$ssh->setup($input['host'], $input['port']);
	    	$success = $ssh->login($input['user'], $input['password']);
	}
	catch(\ErrorException $e) {
	    	return ['type' => 'alert', 'message' => $e->getMessage()];
	}
    	if($success) return ['type' => 'success', 'message' => 'Credentials seem fine'];
    	return ['type' => 'alert', 'message' => 'Test failed'];
    }
}