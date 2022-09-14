<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Card;

class TransactionController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $card = Card::where('user_id', $userId)->first();

        $transactions = Transaction::where('card_id', $card->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $transactions,
        ]);
    }
}
