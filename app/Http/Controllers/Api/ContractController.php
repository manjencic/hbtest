<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Contract updated successfully',
                'data' => [
                    'id' => $request->id,
                    'name' => $request->name,
                ]
            ]
        );
    }
}
