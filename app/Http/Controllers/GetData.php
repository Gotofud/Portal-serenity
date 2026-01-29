<?php

namespace App\Http\Controllers;

use App\Models\Master\NeighborhoodUnit;
use Illuminate\Http\Request;

class GetData extends Controller
{
    public function getRt($community_id){
        $rt = NeighborhoodUnit::where('community_id',$community_id)->get();
        return response()->json($rt);
    }
}
