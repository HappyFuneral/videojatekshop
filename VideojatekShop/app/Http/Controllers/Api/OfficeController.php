<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function officelocations(){

        $data = Office::all('name','lat','lng');
        return response()->json($data);
    }
}
