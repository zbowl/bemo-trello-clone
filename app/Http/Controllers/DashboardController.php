<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class DashboardController extends Controller
{

    public function index()
    {
        //$columns = Column::query()->where('user_id', '=', Auth::user()->user_id)->get();
        $columns = Column::with('cards')->get();

        return Inertia::render('Dashboard', [
            'columns' => $columns,
        ]);
    }

    public function databaseDump()
    {
        $columns = Column::with('cards')->get();
        return response()->json([$columns]);
    }

}
