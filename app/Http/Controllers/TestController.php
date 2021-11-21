<?php

namespace App\Http\Controllers;

use App\Jobs\LogTestJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Log::info('Showing user profile for user: ');
       LogTestJob::dispatch("BENIM Mesaj");

        return response(['message'=>'success'],200);
    }
}
