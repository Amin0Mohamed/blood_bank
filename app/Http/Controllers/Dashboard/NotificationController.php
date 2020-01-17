<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Notification;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('dashboard.notifications.index',compact('notifications'));
    }

    public function destroy($id)
    {
        $contacts = Notification::findOrFail($id);
        $contacts->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.notifications.index');
    }
}
