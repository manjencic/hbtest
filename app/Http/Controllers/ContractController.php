<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Contract as ContractService;

class ContractController extends Controller
{

    public function __construct(ContractService  $contractService)
    {
        $this->contractService = $contractService;
    }

    public function index(Request $request)
    {
        $this->contractService->update(556515, 'Igor Manjencic');
        echo 'sadsa';exit;
    }

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

