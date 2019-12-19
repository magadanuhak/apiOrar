<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\PortfolioResource;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() : object
    {
        return response(Portfolio::with('user:id,name')->get());
    }

    public function store(PortfolioRequest $request) : object
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        Portfolio::create($request->all());
        return response()->json([ "created" => true]);
    }

    public function show(Portfolio $portfolio) : object
    {
        return new PortfolioResource($portfolio);
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio) : object
    {
        $portfolio->update($request->all());
        return response()->json(["updated" => true]);
    }

    public function destroy(Request $portfolio) : object
    {
        $portfolio->delete();
        return response()->json(["deleted" => true]);
    }
}
