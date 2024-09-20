<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    // عرض الجهة المعنية
    public function index()
    {
        return Agency::firstOrFail(); // استرجع الجهة الوحيدة
    }

    // عرض الجهة المعنية المحددة
    public function show($id)
    {
        return Agency::findOrFail($id); // استرجع الجهة بناءً على المعرف
    }

    // إنشاء أو تحديث الجهة المعنية (يتم استخدام هذا لإعداد الجهة إذا لم تكن موجودة)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'responsible_person' => 'nullable|string',
        ]);

        $agency = Agency::updateOrCreate(['id' => 1], $validated);

        return response()->json($agency, 201);
    }

    // تحديث الجهة المعنية
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'responsible_person' => 'nullable|string',
        ]);

        $agency = Agency::findOrFail($id);
        $agency->update($validated);

        return response()->json($agency);
    }

    // حذف الجهة المعنية
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();

        return response()->json(null, 204);
    }
}
