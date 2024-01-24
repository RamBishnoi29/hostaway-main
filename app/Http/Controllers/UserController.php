<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        if (session()->has('loggedInUser')) {
            return redirect('/profile');
        } else {
            return view('auth.login');
        }
    }

    public function register()
    {
        if (session()->has('loggedInUser')) {
            return redirect('/profile');
        } else {
            return view('auth.register');
        }
    }

    public function forgot()
    {
        return view('auth.forgot');
    }
    public function reset(Request $request)
    {
        $email=$request->email;
        $token=$request->token;
        return view('auth.reset',['email'=>$email,'token'=>$token]);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout()
    {
        if (session()->has('loggedInUser')) {
            session()->pull('loggedInUser');
            return redirect('/login');
        }
    }

    //handle register user ajax request

    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|max:30',
            'cpassword' => 'required|min:6|same:password'
        ], [
            'cpassword.same' => 'Password did not matched!',
            'cpassword.required' => 'Confirm password is required!'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Registered Successfully !'
            ]);
        }
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:30',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('loggedInUser', $user->id);
                    $request->session()->put('loggedInUserName', $user->name);
                    $request->session()->put('listing_id', 0);
                    return response()->json([
                        'status' => 200,
                        'messages' => 'success'
                    ]);
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'E-mail or Password is incorrect'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'User Not Found !'
                ]);
            }
        }
    }

    //handle forgot password ajax request
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $token = Str::uuid();
            $user = DB::table('users')->where('email', $request->email)->first();
            $details = [
                'body' => route('reset', ['email' => $request->email, 'token' => $token])
            ];

            if ($user) {
                User::where('email', $request->email)->update([
                    'token' => $token,
                    'token_expire' => Carbon::now()->addMinutes(10)->toDateTimeString()
                ]);

                Mail::to($request->email)->send(new ForgotPassword($details));
                return response()->json([
                    'status' => 200,
                    'messages' => 'Reset Password link has been send to your E-Mail'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'This E-Mail not Registered with us !'
                ]);
            }
        }
    }

    //handle reset password ajax request
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|max:30',
            'cpassword' => 'required|min:6|max:30|same:password'
        ],[
            'cpassword.same' => 'Password did not Matched',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = DB::table('users')->where('email', $request->email)->whereNotNull('token')
            ->where('token',$request->token)->where('token_expire','>',
        Carbon::now())->exists();

            if ($user) {
                User::where('email', $request->email)->update([
                    'password' => Hash::make($request->password),
                    'token'=>null,
                    'token_expire' =>null 
                ]);

                return response()->json([
                    'status' => 200,
                    'messages' => 'New Password Updated ! &nbsp;&nbsp;&nbsp; <a href="/login">
                    login</a>'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Reset Link Expireed! Request for new reset password link '
                ]);
            }
        }
    }
}