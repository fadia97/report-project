<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    public function index(Report $report)
    {
        return response()->json($report->attachments);
    }

    public function store(Request $request, Report $report)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:20480', // يمكن تعديل الأنواع والحجم حسب الحاجة
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $file = $request->file('file');
        $filePath = $file->store('attachments', 'public');
        $fileType = $file->getClientMimeType();

        $attachment = $report->attachments()->create([
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);

        return response()->json($attachment, 201);
    }

    public function show(Report $report, Attachment $attachment)
    {
        return response()->json($attachment);
    }

    public function destroy(Report $report, Attachment $attachment)
    {
        Storage::disk('public')->delete($attachment->file_path);
        $attachment->delete();

        return response()->json(null, 204);
    }
}
