<?php

namespace App\Http\Controllers;

use App\Models\links;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class linksController extends Controller
{
    public function create(Request $request) {

        if($request->time) $time = new Carbon($request->time); else $time = null;

        $link = new links();

        $url = $request->url;
        $shortUrl = substr(md5(rand(0, 1000) . $url . $time . $request->numberClicks), 0, 8);

        $link->originalLink = $url;
        $link->shortLink = $shortUrl;
        $link->creatorId = Auth::user()->id ?? null;
        $link->timeOfDeath = Auth::user() ? $time : now()->addMonth();
        $link->maxClicks = $request->numberClicks == 0 ? null : $request->numberClicks;

        $link->save();

        $id = $link->id;
        return redirect()->route('done', compact('id'));
    }

    public function done($id) {
        $url = links::find($id)->shortLink;
        return view('done', compact('url'));
    }

    public function open($url)
    {
        $links = links::where('shortLink', $url)->get();
        $q = null;
        foreach ($links as $link) {
            $q = $link;
            break;
        }

        $mc = $q->maxClicks;
        $mc--;

        if ($q->status == 0) {
            if ($q->timeOfDeath) {
                if ($q->timeOfDeath < now()) {
                    return redirect()->route('Exc', ['type' => 1]);
                } else if ($mc && $mc < $q->numberOfClicks) {
                    return redirect()->route('Exc', ['type' => 2]);
                } else {
                    $q->numberOfClicks++;
                    $q->save();
                    return redirect($q->originalLink);
                }
            } else if ($mc && $mc < $q->numberOfClicks) {
                return redirect()->route('Exc', ['type' => 2]);
            } else {
                $q->numberOfClicks++;
                $q->save();
                return redirect($q->originalLink);
            }
        } else if ($q->status == 1) {
            return redirect()->route('Exc', ['type' => 3]);
        }
    }

    public function ban($id)
    {
        $link = links::find($id);

        $link->status = 1;

        $link->save();

        return redirect()->back();
    }

    public function unban($id)
    {
        $link = links::find($id);

        $link->status = 0;

        $link->save();

        return redirect()->back();
    }

    public function edit($id) {
        $link = links::find($id);

        return view('edit', compact('link'));
    }

    public function update($id, Request $request) {

        if($request->time) $time = new Carbon($request->time); else $time = null;

        $link = links::find($id);

        $url = $request->url;

        $link->originalLink = $url;
        $link->timeOfDeath = $time;
        $link->maxClicks = $request->numberClicks == 0 ? null : $request->numberClicks;

        $link->save();

        $id = $link->id;

        return redirect()->route('Main')->with('success', 'Ссылка успешно изменена');
    }

    public function delete($id) {
        links::find($id)->delete();

        return redirect()->route('Main')->with('success', 'Ссылка успешно удалена');
    }

    public function exc($type) {
        return view('exc', compact('type'));
    }
}
