<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class AuthController extends Controller
{
    public $successStatus = 200;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * login api
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $isLoggedIn = Auth::check();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success,'isLoggedIn'=>$isLoggedIn], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user();
        $isLoggedIn= Auth::check();
        return response()->json(['success' => $user,'isLoggedIn'=>$isLoggedIn], $this-> successStatus);
    }
    public function tokenCheck(Request $request){
        return response()->json(['data'=>\auth()->user()]);
    }

}
