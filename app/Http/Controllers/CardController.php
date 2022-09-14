<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $cards = Card::where('user_id', $userId)->get();

        return response()->json([
            'status' => 'success',
            'data' => $cards,
        ]);
    }

    public function create(Request $request)
    {
        // $this->validate($request, [
        //     'user_id' => 'required|integer',
        //     'number' => 'required|string',
        //     'hoder' => 'required|string',
        //     'expiry_date' => 'required|date',
        //     'security_code' => 'required|string',
        //     'type' => 'nullable|in:credit_card,silver_card',
        // ]);

        $data = $request->all();
        $data['security_code'] = Hash::make($data['security_code']);

        $card = Card::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $card,
        ]);
    }

    public function show($id)
    {
        $userId = auth()->user()->id;
        $card = Card::where('user_id', $userId)->find($id);
        return response()->json([
            'status' => 'success',
            'data' => $card,
        ]);
    }

    public function set_pin(Request $request, $id)
    {
        $card = Card::find($id);

        if (!$card) {
            return response()->json([
                'status' => 'error',
                "message" => 'card not found'
            ], 404);
        }
        $data = $request->security_code();
        dd($data);

        $card->update([
            'security_code' => Hash::make($data['security_code'])
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'pin has changed'
        ]);
    }

    public function destroy($id) {
        $card = Card::find($id);

        if (!$card) {
            return response()->json([
                'status' => 'error',
                "message" => 'card not found'
            ], 404);
        }

        // delete card
        $card->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'card deleted'
        ]);
    }
}
