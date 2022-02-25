<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

 /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="EMS  Version1 OpenApi Documentation",
     *      description="this is the full documentation that can guide you while using these APIs",
     *      @OA\Contact(
     *          email="uyisaristide@gmail.com"
     *      ),
     *      
     * )
     * 
     *
     *          
     *
     * 

     *
     * @OA\Tag(
     *     name="EMS",
     *     description="API Endpoints of EMS"
     * )
     */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
