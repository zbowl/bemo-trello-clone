<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function token()
    {
        $user = User::where('email', 'test@example.com')->first();

        return $user->createToken('personalapitoken')->plainTextToken;
    }

    public function cards()
    {
        return CardResource::collection(Card::all());
    }
}
