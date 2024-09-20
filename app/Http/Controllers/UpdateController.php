<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'report_id' => 'required|exists:reports,id',
            'content' => 'required|string',
        ]);

        $update = Update::create($data);
        return response()->json($update, 201);
    }

    public function index($reportId)
    {
        $updates = Update::where('report_id', $reportId)->with('comments')->get();
        return response()->json($updates);
    }
}
