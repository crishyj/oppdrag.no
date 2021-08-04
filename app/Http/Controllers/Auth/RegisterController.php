<?php

namespace App\Http\Controllers\Auth;

use App\Data\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Data\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use App\Notifications\ActivationNotification;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|regex:/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/',
            'password' => 'required|string|min:8|max:25',
            'role_id' => ['required', Rule::exists('roles', 'id')->where('can_register', 1)],
            'social_account_id' => 'nullable',
            'social_account_type' => 'nullable|in:facebook',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create(
            [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'social_account_id' => (!empty($data['social_account_id']))?$data['social_account_id']:null,
            'social_account_type' => (!empty($data['social_account_type']))?$data['social_account_type']:null,
            'activation_key' => Hash::make(Carbon::now()),
            'status' => 'pending',
            ]
        );
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed                    $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
   
        $output = ['data' => app('UserRepository')->findById($user->id,false),'message'=>trans('auth.registered')];
       
        $activation_key = app('UserRepository')->findById($user->id,false)->activation_key;
        $user_info = app('UserRepository')->findById($user->id,false);
        $receiver_email = app('UserRepository')->findById($user->id,false)->email;
        $sender_email = 'info@oppdrag.no';
        $emailFrom = $sender_email;
        $reply = $sender_email;
        $to = $receiver_email;
        $subject = "Account Activation Email";
        $message = '<body >
            <div style="width:500px; margin:10px auto; background:#fff; border:1px solid #ccc">
                <table  width="100%" border="0" cellspacing="5" cellpadding="10">
                    
                    <tr>
                        <td style="font-size:16px; color:#323232; font-weight: bold; text-align:center">
                            Congratulations '.$user_info->first_name.' '.$user_info->last_name.'! Your account has been successfully created.
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14px; text-align:center">
                            We are excited to welcome you to oppdrag. To activate your account please click on the button provided below.
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14px; text-align:center">
                            <a href="'.url('/').'/user/activate?token='.$activation_key.'">
                                <button style="background-color:#8200ff; padding: 5px; color: #fff">Active Now</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:16px; color:#323232; font-weight: bold; text-align:center">
                            Thanks
                        </td>
                    </tr>
                     <tr>
                        <td style="font-size:16px; color:#323232; font-weight: bold; text-align:center">
                            Oppdrag
                        </td>
                    </tr>
                </table>
            </div>
        </body>
        ';
        
        $headers = "From:" . $emailFrom . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        mail($to,$subject,$message,$headers);

        $name = 'Test';
        Mail::to($to)->send(new SendMailable($name));
        
        return response()->json($output, Response::HTTP_OK);
    }
}
