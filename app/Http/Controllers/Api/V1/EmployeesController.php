<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;



class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *@OA\Get(
     *      path="/api/v1/employees",
     *      operationId="getEmployeesList",
     *      tags={"Employees"},
     *      summary="Get list of Employees",
     *      description="Returns list of Employees",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     *      
     *     )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employees::all();
    }

    /**
     * Add  the new Employee
     * @OA\Post (
     *     path="/api/v1/employees",
     *     tags={"Employees"},
     *     security={{ "sanctum": {} }},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="nationality",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"defoo",
     *                     "email":"defoo@email.com",
     *                     "nationality":"fool",
     *                     "status":"fool"
     *                }
     *             )
     *         )
     *      ),
     *        @OA\Response(
     *          response=200,
     *          description="Broken Validation"
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="email", type="string", example="email"),
     *              @OA\Property(property="nationality", type="string", example="nationality"),
     *              @OA\Property(property="status", type="string", example="status"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      ),
     *       @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="unauthorised"
     *      ),
     *       @OA\Response(
     *          response=419,
     *          description=" unsupported request",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return employees::create($request->all());
    }



    /**
     * Display specified employee
     * @OA\Get (
     *     path="/api/v1/employees/{id}",
     *     tags={"Employees"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="email", type="string", example="email"),
     *              @OA\Property(property="nationality", type="string", example="nationality"),
     *              @OA\Property(property="status", type="string", example="status"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          
     *      ),
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return employees::findOrFail($id);
    }





    /**
     * Update Employee
     * @OA\Put (
     *     path="/api/v1/employees/{id}",
     *     tags={"Employees"},
     *     security={{ "sanctum": {} }},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="nationality",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"example name",
     *                     "email":"example email",
     *                     "nationality":"example nationality",
     *                     "status":"example status"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="email", type="string", example="email"),
     *              @OA\Property(property="nationality", type="string", example="nationality"),
     *              @OA\Property(property="status", type="string", example="status"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="unauthorised"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="id not valid"),
     *          ),
     *      ),
     *        
     *       @OA\Response(
     *          response=419,
     *          description="non suppoeted request",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee= Employees::findOrFail($id);
        $employee->update($request->all());
        
        return $employee;
    }



    

    /**
     * Remove specified Employee
     * @OA\Delete (
     *     path="/api/v1/employees/{id}",
     *     tags={"Employees"},
     *     security={{ "sanctum": {} }},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successfully deleted",
     *         
     *     ),
     *      @OA\Response(
     *          response=419,
     *          description="Your request is not stateful"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="unauthorised"
     *      ),
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return employees::destroy($id);
        
    }


    
    /**
     * search a specified name
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return employees::where('name','like','%'.$name.'%')->get();
    }
}
