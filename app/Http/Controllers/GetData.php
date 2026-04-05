<?php

namespace App\Http\Controllers;

use App\Models\Master\Block;
use App\Models\Master\House;
use App\Models\Master\NeighborhoodUnit;
use Illuminate\Http\Request;

class GetData extends Controller
{
    public function getRt($community_id)
    {
        $rt = NeighborhoodUnit::where('community_id', $community_id)->get();
        return response()->json($rt);
    }

    public function getBlock($community_id, $neighborhood_id)
    {
        $blok = Block::where('community_id', $community_id)->where('neighborhood_id', $neighborhood_id)->get();
        return response()->json($blok);
    }

    public function getHouse($community_id, $neighborhood_id, $block_id)
    {
        $house = House::where('community_id', $community_id)
            ->where('neighborhood_id', $neighborhood_id)
            ->where('block_id', $block_id)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'label' => 'Blok ' . $item->blocks->name . ' No ' . $item->number 
                ];
            });
        return response()->json($house);
    }
}
