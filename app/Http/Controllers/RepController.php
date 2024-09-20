<?php

namespace App\Http\Controllers;

use App\Models\Rep;
use Illuminate\Http\Request;

class RepController extends Controller
{
    // عرض جميع البلاغات
    public function index()
    {
        $reps = Rep::all();
        return response()->json($reps);
    }

    // عرض بلاغ محدد
    public function show($id)
    {
        $rep = Rep::find($id);
        if (!$rep) {
            return response()->json(['message' => 'بلاغ غير موجود'], 404);
        }
        return response()->json($rep);
    }

    // إضافة بلاغ جديد
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            
            'status' => 'in:' . implode(',', Rep::statuses()),
        ]);

        $rep = Rep::create([
            'description' => $request->description,
            'reported_at' => now(),
            'status' => $request->status ?? Rep::STATUS_PENDING,
        ]);

        return response()->json($rep, 201);
    }

    // تحديث بلاغ موجود
    public function update(Request $request, $id)
    {
        $rep = Rep::find($id);
        if (!$rep) {
            return response()->json(['message' => 'بلاغ غير موجود'], 404);
        }

        $request->validate([
            'description' => 'sometimes|required|string',
            'location' => 'sometimes|required|string',
            'status' => 'sometimes|in:' . implode(',', Rep::statuses()),
        ]);

        $rep->update($request->only(['description', 'location', 'status']));

        return response()->json($rep);
    }

    // حذف بلاغ
    public function destroy($id)
    {
        $rep = Rep::find($id);
        if (!$rep) {
            return response()->json(['message' => 'بلاغ غير موجود'], 404);
        }

        $rep->delete();
        return response()->json(['message' => 'تم حذف البلاغ بنجاح']);
    }
}
