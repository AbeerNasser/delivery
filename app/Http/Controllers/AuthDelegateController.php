<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Delegate;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthDelegateController extends Controller
{
    use GeneralTrait;

    public function login(Request $request)
    {

        try {
            $rules = [
                "phone" => "required",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //login

            $credentials = $request -> only(['phone','password']) ;

            $token =  Auth::guard('delegate-api') -> attempt($credentials);

            if(!$token)
               return $this->returnError('E001','بيانات الدخول غير صحيحة');

            $delegateAdmin = Auth::guard('delegate-api') -> user();
            $delegateAdmin -> api_token = $token;
            //return token
             return $this -> returnData('delegateAdmin' , $delegateAdmin,'تم الدخول كمندوب بنجاح');

        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }


    }

     /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:delegates',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $delegateUser = Delegate::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'تم تسجيل مندوب جديد بنجاح',
            'delegateUser' => $delegateUser
        ], 201);
    }
}
