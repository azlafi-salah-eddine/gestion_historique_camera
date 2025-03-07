<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Userr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserrRequest;
use App\Http\Requests\UpdateUserrRequest;

class UserrController extends Controller
{
    // public function index()
    // {
    //     $userrs = Userr::all();
    //     return response()->json($userrs);
    // }
    public function index()
    {
        $userrs = Userr::where('role', 'user')->get();
        return response()->json($userrs);
    }

    public function store(StoreUserrRequest $request)
    {
        $userr = Userr::create($request->validated());
        return response()->json($userr, 201);
    }

    public function show(Userr $userr)
    {
        return response()->json($userr);
    }

    public function update(UpdateUserrRequest $request, Userr $userr)
    {
        $userr->update($request->validated());
        return response()->json($userr);
    }

    public function destroy(Userr $userr)
    {
        $userr->delete();
        return response()->json(null, 204);
    }
}
