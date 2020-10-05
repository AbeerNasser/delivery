<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Traits\GeneralTrait;
use App\Models\Delegate;


class ForgotPasswordController extends Controller
{
    use GeneralTrait;

    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        // return response()->json(["msg" => 'Reset password link sent on your email id.']);
        return $this -> returnSuccessMessage('تم ارسال رقم السر الجديد الي الايميل ');
        //return response()->json(["msg" => 'تم ارسال رقم السر الجديد الي الايميل ']);
    }
    public function delegateForgot() {

        $credentials = request()->validate(['phone' => 'required']);

        // Password::sendResetLink($credentials);

        // return response()->json(["msg" => 'Reset password link sent on your email id.']);
        return $this -> returnSuccessMessage('سيتم ارسال رقم السر الجديد في رساله');
        //return response()->json(["msg" => 'تم ارسال رقم السر الجديد الي الايميل ']);
    }

    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }

        return response()->json(["msg" => "تم تغير رقم السر بنجاح"]);
    }
}
