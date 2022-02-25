<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    /**
     *@OA\Post(
     *      path="/api/v1/register",
     *      tags={"USER"},
     *      summary="REGISTER NEW USER",
     *      operationId="register",
     *      @OA\Parameter(
     *          name="name",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password_confirmation",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="validation not  obeyed"
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="registered sucessfully"
     *      ),
     *      
     *      @OA\Response(
     *          response=419,
     *          description="Your request is not stateful"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     * 
     * )
     *
     * Register new user.
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {

        $field = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password'])
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }



    




    /**
     * LOGIN
     * @OA\Post (
     *     path="/api/v1/login",
     *     tags={"USER"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *              
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     *                     
     *                 ),
     *                 example={
     *                     "email":"aris@gmail.com",
     *                     "password":"aristide",
     *                    
     *                }
     *             )
     *                
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="loged in successifully",
     *          @OA\JsonContent(
     *             
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="email", type="string", example="email"),
     *              @OA\Property(property="api_token", type="string", example="token"),
     *              
     *             
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="invalid credentials",
     *          
     *      ),
     *       
     *     
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     *      
     *      
     *      )
     * )
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $field = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where(['email' => $field['email']])->first();

        if (!$user || !Hash::check($field['password'], $user->password)) {
            return ['message' => 'bad credentials'];
        }

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /**
     * logout
     * @OA\Get (
     *     path="/api/v1/logout",
     *     tags={"USER"},
     *     security={{ "sanctum": {} }},
     *     
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         
     *     ),
     *     
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     *      
     *      @OA\Response(
     *          response=401,
     *          description="un authenticated",
     *          @OA\JsonContent(
     *              type="object",
     *              example={
     *                  "message": "unauthorized"
     *              }
     *          )
     *      )
     * )
     *
     * 
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Successfully Loged Out'
        ];
    }

}
