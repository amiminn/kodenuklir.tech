<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function index()
    {
        //get data from table
        $result = Chat::orderBy('created_at')->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data All chat',
            'data'    => $result
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $result = Chat::create([
            'user'   => $request->user,
            'text'     => $request->text,
        ]);

        //success save to database
        if ($result) {

            return response()->json([
                'success' => true,
                'message' => 'Create new message Success',
                'data'    => $result
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Create new message Failed',
        ], 409);
    }


    public function reset()
    {
        DB::table('chats')->truncate();

        return response()->json([
            'success' => true,
            'message' => 'Data All Chat Deleted',
        ], 200);
    }
}
