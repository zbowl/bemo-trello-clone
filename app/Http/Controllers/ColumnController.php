<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Column;
use App\Http\Requests\StoreColumnRequest;
use App\Http\Requests\UpdateColumnRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ColumnController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColumnRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreColumnRequest $request)
    {
        Column::create([
            'title' => $request->title,
            //'user_id' => Auth::user()->user_id,
            'user_id' => 1,
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColumnRequest  $request
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateColumnRequest $request, Column $column)
    {
        $column->updateOrFail([
            'title' => $request->title,
            //'user_id' => Auth::user()->user_id,
            'user_id' => 1,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardRequest  $request
     * @param  \App\Models\Card  $card
     * @return \Inertia\Response
     */
    public function updateColumns(Request $request)
    {
        foreach($request->columns as $column) {
            $columnId = $column['id'];
            foreach($column['cards'] as $card) {
                $card = Card::find($card['id']);
                $card->column_id = $columnId;
                $card->save();
            }
        }

        $columns = Column::with('cards')->get();

        return Inertia::render('Dashboard', [
            'columns' => $columns,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Column $column)
    {
        $column->deleteOrFail();

        return redirect()->route('dashboard');
    }
}
