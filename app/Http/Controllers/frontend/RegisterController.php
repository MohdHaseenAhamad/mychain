<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class RegisterController extends Controller {
    var $_folder_name = 'frontend/';
    private $_user_data = [];

    public function index() {

        return view($this->_folder_name . '/register');
    }

    public function create(UserRequest $request) {
        $request->validated();
        $mobile = $request->mobile_cid . "##" . $request->mobile_isd . "##" . $request->mobile;
        $user_obj = new User();
        $user_obj->sponser_id = $request->sponser_id;
        $user_obj->name = $request->name;
        $user_obj->mobile = $mobile;
        $user_obj->email = $request->email;
        $user_obj->password = Hash::make($request->password);
        $user_obj->created_at = date('Y-m-d H:i:s');
        if ($user_obj->save()) {
            $userOtp = $this->generateOtp($request->email);
            return redirect()->route('verification', ['user_id' => $userOtp->user_id])
                ->with('success', "OTP has been sent on Your Mobile Number.");
        }

    }

    public function generateOtp($email) {
        $user = User::where('email', $email)->first();
        /* User Does not Have Any Existing OTP */
        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();

        $now = now();

        if ($userOtp && $now->isBefore($userOtp->expire_at)) {
            return $userOtp;
        }
        $otp = rand(100000, 999999);
        $mailData = [
            'name'=>$user->name,'otp'=>$otp,'email'=>$email,'subject'=>'OTP Verify'
        ];
        $this->composeEmail($mailData);

        /* Create a New OTP */
        return UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expire_at' => $now->addMinutes(10)
        ]);
    }

    public function resendOTP($user_id) {
        $user = User::where('id', $user_id)->first();

        $userOtp = UserOtp::where('user_id', $user_id)->latest()->first();
        $now = now();

        if ($userOtp && $now->isBefore($userOtp->expire_at)) {
            return $userOtp;
        }
        $otp = rand(100000, 999999);
        $mailData = [
            'name'=>$user->name,'otp'=>$otp,'email'=>$user->email,'subject'=>'OTP Verify'
        ];
        $this->composeEmail($mailData);
        UserOtp::create([
            'user_id' => $user_id,
            'otp' => $otp,
            'expire_at' => $now->addMinutes(10)
        ]);
        /* Create a New OTP */
        return redirect()->back()->with('error', 'OTP Re-send successfully');
    }


    public function verification($user_id) {

        return view($this->_folder_name . 'otpVerification')->with([
            'user_id' => $user_id
        ]);
    }

    public function loginWithOtp(Request $request) {
        /* Validation */
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        /* Validation Logic */
        $userOtp = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = now();
        if (!$userOtp) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        } else if ($userOtp && $now->isAfter($userOtp->expire_at)) {

            return redirect()->back()->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId($request->user_id)->first();

        if ($user) {

            $userOtp->update([
                'expire_at' => now()
            ]);

            User::whereId($request->user_id)->update(['status' => 'Active']);
            Auth::login($user);

            return redirect('/dashboard')->with('success', 'Welcome to Teacher Dashboard');
        }

        return redirect()->route('verification', ['user_id' => $userOtp->user_id])->with('error', 'Your Otp is not correct');
    }

    public function composeEmail($mail_data) {

        $send_success =  Mail::send('email-template.otp-verification', $mail_data, function ($message) use ($mail_data) {
            $message->from('happyhassen0786@gmail.com', 'MyChain');
            $message->sender('happyhassen0786@gmail.com', 'MyChain');
            $message->to($mail_data['email'], $mail_data['name']);
            $message->subject($mail_data['subject']);
        });

        return true;

    }

    public function forgotPassword()
    {
        return view($this->_folder_name . '/forgot-password');
    }
    public function sendOTPOnMail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!empty($user))
        {
            $otp = rand(100000, 999999);
            /* User Does not Have Any Existing OTP */
            $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();

            $now = now();

            if ($userOtp && $now->isBefore($userOtp->expire_at))
            {
                return $userOtp;
            }
            $mailData = [
                'name'=>$user->name,'otp'=>$otp,'email'=>$user->email,'subject'=>'OTP Verify'
            ];
            $this->composeEmail($mailData);
            /* Create a New OTP */
            UserOtp::create([
                'user_id' => $user->id,
                'otp' => $otp,
                'expire_at' => $now->addMinutes(10)
            ]);
            return redirect()->route('verification-for-forgot', ['user_id' =>  $user->id])->with('success', 'OTP send successfully.');
        }else
        {
            return redirect()->back()->with('error', 'Your Email does not exist.');
        }

    }
    public function verificationForForgot($user_id)
    {
        return view($this->_folder_name . 'otpVerification-for-forgot')->with([
            'user_id' => $user_id
        ]);
    }

    public function createNewPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        /* Validation Logic */
        $userOtp = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();
        $now = now();
        if (!$userOtp) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        } else if ($userOtp && $now->isAfter($userOtp->expire_at)) {

            return redirect()->back()->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId($request->user_id)->first();

        if ($user) {

            $userOtp->update([
                'expire_at' => now()
            ]);


            return redirect()->route('new-password',['user_id' => $userOtp->user_id])->with('success', 'Welcome to Teacher Dashboard');
        }

        return redirect()->route('verification-for-forgot', ['user_id' => $userOtp->user_id])->with('error', 'Your Otp is not correct');
    }
    public function newPassword($user_id)
    {
        return view($this->_folder_name . 'new-password')->with([
            'user_id' => $user_id
        ]);
    }
    public function saveNewPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $retval = User::whereId($request->user_id)->update(['password' => Hash::make($request->password)]);
        if($retval)
        {
            return redirect('login');
        }else
        {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

    }


}
