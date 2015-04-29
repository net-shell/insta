<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;

class DashboardController extends Controller
{
    public function index()
    {
    	$servers = Server::all();
    	return view('dashboard', compact('servers'));
    }
}