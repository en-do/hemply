<?php

namespace App\Http\Controllers;

use App\Models\Strain;
use App\Models\Terpene;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TerpeneControlller extends Controller
{
    public function page() {
        $terpenes = Terpene::where('active', 1)->get();

        return view('client.terpenes.page', compact('terpenes'));
    }

    public function view($slug) {
        $terpene = Terpene::where('slug', $slug)->where('active', 1)->firstOrFail();
        $strains = Strain::where('terpene_id', $terpene->id)->where('active', 1)->inRandomOrder()->limit(8)->get();

        return view('client.terpenes.view', compact('terpene', 'strains'));
    }

    // dashboard
    public function list() {
        $terpenes = Terpene::paginate(10);

        return view('dashboard.terpenes.list', compact('terpenes'));
    }

    public function edit($id) {
        $terpene = Terpene::findOrFail($id);

        return view('dashboard.terpenes.edit', compact('terpene'));
    }

    public function update(Request $request, $terpene_id) {
        $request->validate([
            'icon' => ['nullable', 'image'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'intro' => ['nullable', 'string', 'min:30'],
            'description' => ['nullable', 'string', 'min:30'],
            'slug' => ['nullable', 'string', 'min:3', 'max:255', 'unique:terpenes,slug,' . $terpene_id],
            'color' => ['nullable', 'string', 'min:3', 'max:64'],
            'status' => ['required', 'boolean']
        ]);

        $terpene = Terpene::findOrFail($terpene_id);

        $terpene->title = $request->title;
        $terpene->intro = $request->intro;
        $terpene->description = $request->description;
        $terpene->slug = $request->slug;

        if(!$request->filled('slug')) {
            $terpene->slug = Str::slug($request->title);
        }

        $terpene->hex_color = $request->color;
        $terpene->active = $request->status;

        $meta = $terpene->meta()->updateOrCreate([
            'id' => $terpene->meta_id ?? null
        ],[
            'title' => $request->meta_title ?? $request->title,
            'description' => $request->meta_description ?? null,
            'no_index' => $request->no_index ?? false,
            'no_follow' => $request->no_follow ?? false
        ]);

        $terpene->meta_id = $meta->id;

        if($terpene->save()) {
            return redirect()->route('dashboard.terpenes')->with("success", "Запис [$terpene->id] успішно оновленно");
        }
    }
}
