<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        // جلب المستخدم الحالي (مثلا admin guard لو عندك أدمن)
        $user = auth()->guard('admin')->user();

        // عمل مارك لكل النوتيفيكيشنز كمقروءة
        $user->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }

    public function ClearNotificationsMarker(Request $request)
    {
        // جلب المستخدم الحالي (مثلا admin guard لو عندك أدمن)
        $user = auth()->guard('admin')->user();

        // حذف كل النوتيفيكيشنز
        $user->notifications()->delete();

        return response()->json(['success' => true]);
    }
}
