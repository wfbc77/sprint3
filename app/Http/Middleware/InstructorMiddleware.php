<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class InstructorMiddleware {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
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
		if ($this->auth->guest() == false)
		{
			$type = $this->auth->user()->user_type;
		} else {
			$type = 'guest';
		}


		if ($type == 'instructor' || $type == 'admin')
		{
			return $next($request);
		}
		//return redirect()->back()->with('message', 'Access Denied');
		return $next($request);
	}

}
