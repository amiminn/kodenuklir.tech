<?php

namespace App\Http\Controllers\Api;

use App\Models\SrtLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SrtLinkController extends Controller
{
    
    public function index()
    {
         //get data from table
         $result = SrtLink::latest()->get();

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'List Data Short Link',
             'data'    => $result  
         ], 200);
    }

    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'srt'   => 'required',
            'link' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $result = SrtLink::create([
            'user'   => $request->user,
            'srt'     => $request->srt,
            'link'   => $request->link,
        ]);

        //success save to database
        if($result) {

            return response()->json([
                'success' => true,
                'message' => 'Create short link is Success',
                'data'    => $result  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Create short Link is Failed',
        ], 409);

    }

    
    public function show($id)
    {
         //find by ID
         $result = SrtLink::findOrfail($id);

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'Detail Data Short Link',
             'data'    => $result 
         ], 200);
    }


    public function update(Request $request, $id)
    {
         //set validation
         $validator = Validator::make($request->all(), [
            'srt'   => 'required',
            'link' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find result by ID
        $result = SrtLink::findOrFail($id);

        if($result) {

            //update result
            $result->update([
                'srt'     => $request->srt,
                'link'   => $request->link
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Updated',
                'data'    => $result  
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Data Short Link Not Found',
        ], 404);
    }

    public function destroy($id)
    {
        //find post by ID
        $result = SrtLink::findOrfail($id);

        if($result) {

            //delete result
            $result->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data ShortLink Deleted',
            ], 200);

        }

        //data result not found
        return response()->json([
            'success' => false,
            'message' => 'Short Link Not Found',
        ], 404);
    }
}
