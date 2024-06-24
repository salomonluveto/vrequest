<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Message;


class ApiMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):JsonResponse
    {
        $count=Message::count();

        //$messages= Message::all();
        
        $messages= Message::simplePaginate(5);//->only('messages','current_page','per_page','last_page');

        //$messages=$messages->groupBy('demande_id');
        
        return response()->json([
            'count'=> $count,
            'data'=> $messages,
            //'current_page'=> $messages->currentPage(),
            //'from'=>$messages->firstMessage(),
            //'to'=>$messages->lastMessage(),
            /*
            'per_page'=> $messages->perPage(),
            'last_page'=> $messages->lastPage(),    
        
            'first'=>$messages->url(1),
            'last'=>$messages->url($messages->lastPage()),
            'prev'=>$messages->previousPageUrl(),
            'next'=>$messages->nextPageUrl(),
            */    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message=Message::create($request->all());
        return response()->json([
            'message'=>$message
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message=Message::find($id);
        return response()->json([
            'message'=>$message
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
