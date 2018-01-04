<?php

namespace App\Http\Controllers;

Use App\User;
use Illuminate\Http\Request;

class RemoteController extends Controller
{
	function __construct()
	{

	}

	public function remoteusername(User $user, Request $request)
	{
		$valid = true;

		// $users = array(
		// 	'admin'         => 'admin@domain.com',
		// 	'administrator' => 'administrator@domain.com',
		// 	'root'          => 'root@domain.com',
		// );

		$users1 = User::all();
		foreach($users1 as $wer) {
			$users[$wer['username']] = $wer['email'];
		}
// dd(request('email'));

		if (request('username') && array_key_exists(request('username'), $users)) {
			$valid = false;
		} else if (request('email')) {
			$email = request('email');

			foreach ($users as $k => $v) {
				if ($email == $v) {
					$valid = false;
					break;
				}
			}
		}
		echo json_encode(array('valid' => $valid,));
	}
}
