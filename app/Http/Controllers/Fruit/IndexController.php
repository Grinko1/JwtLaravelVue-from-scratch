<?php

namespace App\Http\Controllers\Fruit;

use App\Http\Controllers\Controller;
use App\Models\Fruit;
use App\Http\Resources\Fruit\FruitResource;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fruits = Fruit::all();

        return FruitResource::collection($fruits);
    }
}
