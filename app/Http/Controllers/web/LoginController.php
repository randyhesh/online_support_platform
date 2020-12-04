<?php


namespace App\Http\Controllers\web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;

use Log;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    /**
     * login function
     * @param Request $request
     * @return array
     */
    public function login(Request $request)
    {
        try {

            $email = $request->input('email');
            $password = $request->input('password');

            $validate = Validator::make($request->input(), array(
                'email' => 'required',
                'password' => 'required'
            ));

            if ($validate->fails()) {
                return array('code' => 400, 'error' => $validate->messages());
            }

            $user = User::where('email', '=', $email)->first();

            if (empty($user)) {
                return array(
                    'code' => 401,
                    'message' => 'Incorrect Username.'
                );
            }
            if (!Hash::check($password, $user->password)) {
                return array(
                    'code' => 401,
                    'message' => 'Incorrect Password.'
                );
            }

            Auth::login($user, true);

            return array(
                'code' => 200,
                'message' => 'success.'
            );

        } catch (\Exception $e) {

            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }
    }

    /**
     * logout function
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logoutUser(Request $request)
    {
        Session::forget('access_token');
        Auth::logout();
        return redirect('/');
    }

}
