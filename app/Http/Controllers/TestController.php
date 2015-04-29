<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\SSH;

class TestController extends Controller
{
    public function index()
    {
    	$default = [
    		'host' => '178.79.171.228',
    		'user' => 'root',
    		'pass' => 'b4lk4n$k1',
    		'output' => session('output')
    	];


    	return view('test')->with($default);
    }

    public function work(Request $request, SSH $ssh)
    {
    	$input = $request->only(['host', 'user', 'pass', 'port']);

    	$input['port'] = (int)$input['port'] > 0 ? (int)$input['port'] : 22;
    	
    	//dd($input);
    	$ssh->setHost($input['host']);
    	$login = $ssh->login($input['user'], $input['pass']);
    	
    	$ver = $ssh->exec('cat /etc/*-release');
    	if(strpos($ver, "\n")) {
    		$ver = substr($ver, 0, strpos($ver, "\n"));
    	}
    	$ver = trim($ver);
    	
    	$pwd = trim($ssh->exec('pwd'));
    	
    	// Debian / Ubuntu
    	// $soft = trim($ssh->exec('dpkg --get-selections | grep -v deinstall'));
    	// CentOS / RedHat
    	$soft = explode("\n", $ssh->exec('rpm -qa'));

    	$output = compact('login', 'ver', 'pwd', 'soft');

    	return redirect('test')->withInput()->with('output', $output);
    }
}
