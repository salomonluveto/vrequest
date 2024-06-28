<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Message;
use App\Models\MessageGroupe;
class ApiMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(MessageResource::collection($messages = Message::all()));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|min:1',
            'message_groupe_id' => 'required|min:1',
            'contenu'=>'required|string',
            // 'time'=>'required',
        ]);
        Message::create($request->all());
        return response()->json([
            'added' => true
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::find($id);
        return response()->json([
            'message' => $message
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