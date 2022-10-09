<?php

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;

	class HakAkses
	{
		/**
		* Hanle an incoming request.
		* 
		*	@param \Illuminate\Http\Request  $request
		*	@param \Closure  $next
		*	@return mixed
		*/
		public function handle(Request $request, Closure $next,$role)
		{
			if($this->getRole(Auth::id())== $role){
				return $next($request);
			}elseif($this->getRole(Auth::id())== 'admin'){
				return $next($request);
			}
			return back();
		}
		public function getRole($id){
			$role = DB::table('users')
			->join('roles','users.roleId','=','roles.id')
			->where('users.id','=',$id)
			->select('roles.name')
			->get();
			return $role[0]->name;
		}
	}