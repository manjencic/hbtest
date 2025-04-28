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
        $success = $this->contractService->update(556515, 'Igor Manjencic');

        return view('contractUpdate')->with([
            'status' => $success ? 'OK' : 'Error'
        ]);
    }
}

