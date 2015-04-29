<?php namespace App\Http\Middleware;

use Closure;

class Authenticate {

	protected $auth;

	public function __construct()
	{
		$this->auth = app()['auth'];
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect('auth/login');
			}
		}

		return $next($request);
	}

}