<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Employees extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'nationality',
        'status'
    ];


//     protected $table = "employees";

//     /**
//      * @param int $id
//      * @return mixed
//      */
//     public function getEmployee(int $id){
//         $employee = $this->where("id",$id)->first();
//         return $employee;
//     }


//     /**
//      * @param int $id
//      * @param array $attributes
//      * @return mixed
//      */
//     public function updateEmployee(int $id, array $attributes){
//         $employee = $this->getEmployee($id);
//         if($employee == null){
//             throw new ModelNotFoundException("Cant find an Employee");
//         }

//         $employee->name = $attributes["name"];
//         $employee->email = $attributes["email"];
//         $employee->code = $attributes["nationality"];
//         $employee->phone = $attributes["status"];
//         $employee->save();
//         return $employee;
//     }

// //    /**
// //      * @param int $id
// //      * @return mixed
// //      */
// //     public function deleteEmployee(int $id){
// //         $employee = $this->getEmployee($id);
// //         if($employee == null){
// //             throw new ModelNotFoundException("Employee not found");
// //         }
// //         return $employee->delete();
// //     }
}



