<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Column;

class CardController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCardRequest $request)
    {
        Card::create([
            'title' => $request->title,
            'description' => $request->description,
            'column_id' => $request->column_id,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardRequest  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $card->forceFill([
            $request->only('title', 'description'),
        ])->save();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Card $card)
    {
        $card->deleteOrFail();

        return redirect()->route('dashboard');
    }
}
