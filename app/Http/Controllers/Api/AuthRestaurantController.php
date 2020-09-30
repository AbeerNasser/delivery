<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthRestaurantController extends Controller
{
    use GeneralTrait;

    public function login(Request $request)
    {

        try {
            $rules = [
                "email" => "required",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //login

            $credentials = $request -> only(['email','password']) ;

            $token =  Auth::guard('restaurant-api') -> attempt($credentials);

            if(!$token)
               return $this->returnError('E001','بيانات الدخول غير صحيحة');

            $admin = Auth::guard('restaurant-api') -> user();
            $admin -> api_token = $token;
            //return token
             return $this -> returnData('restaurantAdmin' , $admin,'تم الدخول كمطعم بنجاح');

        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }


    }

    public function register(Request $request)
    {

        try {
            $rules = [
                "name" => "required",
                "email" => "required",
                "password" => "required"
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //register

            $restaurantAdmin = Restaurant::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));

            return $this -> returnData('restaurantAdmin' , $restaurantAdmin,'تم تسجيل مطعم جديد بنجاح');

        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    
}
