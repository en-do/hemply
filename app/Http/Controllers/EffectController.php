<?php

namespace App\Http\Controllers;

use App\Models\Effect;
use Illuminate\Http\Request;

class EffectController extends Controller
{
    public function list() {
        $effects = Effect::paginate(10);

        return view('dashboard.effects.list', compact('effects'));
    }

    public function edit($effect_id) {
        $effect = Effect::findOrFail($effect_id);

        return view('dashboard.effects.edit', compact('effect'));
    }

    public function update(Request $request, $effect_id) {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:30'],
            'slug' => ['required', 'min:3', 'max:255', 'unique:effects,slug,' . $effect_id],
            'status' => ['required', 'integer']
        ]);

        $effect = Effect::findOrFail($effect_id);

        $effect->title = $request->title;
        $effect->description = $request->description;
        $effect->slug = $request->slug;

        $effect->active = $request->status;

        $meta = $effect->meta()->updateOrCreate([
            'id' => $effect->meta_id ?? null
        ],[
            'title' => $request->meta_title ?? $request->title,
            'description' => $request->meta_description ?? null,
            'no_index' => $request->no_index ?? false,
            'no_follow' => $request->no_follow ?? false
        ]);

        $effect->meta_id = $meta->id;

        if($effect->save()) {
            return redirect()->route('dashboard.effects')->with("success", "Запис [$effect->id] успішно оновленно");
        }
    }
}
