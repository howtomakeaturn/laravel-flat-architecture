<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyEventController extends Controller
{
    function index(Request $request)
    {
        $events = \App\Queries\GetUserEventsWithPagination::run(Auth::user()->id);

        return view('my-events.index', compact('events'));
    }

    function edit($id, Request $request)
    {
        $event = \App\Queries\GetEvent::run($id);

        if ($event->user->id != Auth::user()->id) {
            abort(403);
        }

        return view('add-event', compact('event'));
    }

    function update($id, Request $request)
    {
        $event = \App\Queries\GetEvent::run($id);

        if ($event->user->id != Auth::user()->id) {
            abort(403);
        }

        $imageFileName = null;

        if ($request->hasFile('image')) {
            $imageFileName = handleImage($request);
        }

        $event = \App\Mutations\UpdateEvent::run(
            event: $event,
            title: $request->input('name'),
            description: $request->input('description'),
            city: $request->input('city'),
            url: $request->input('url'),
            placeKey: $request->input('place_name'),
            category: $request->input('category'),
            fromDate: $request->input('from'),
            toDate: $request->input('to'),
            inDates: explode(',', $request->get('in_dates')),
            imageFileName: $imageFileName,
        );

        return redirect()->to('/my-events')->with('status', '活動修改成功');
    }

    function destroy($id, Request $request)
    {
        $event = \App\Queries\GetEvent::run($id);

        if ($event->user->id != Auth::user()->id) {
            abort(403);
        }

        \App\Mutations\DeleteEvent::run($event);

        return redirect()->to('/my-events')->with('status', '活動刪除成功');
    }
}
