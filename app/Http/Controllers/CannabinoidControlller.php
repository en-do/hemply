<?php

namespace App\Http\Controllers;

use App\Models\Cannabinoid;
use App\Models\Strain;
use Illuminate\Http\Request;

class CannabinoidControlller extends Controller
{
    public function page() {
        $cannabinoids = Cannabinoid::where('active', 1)->get();
        $strains = Strain::where('active', 1)->inRandomOrder()->limit(8)->get();

        return view('client.cannabinoid.page', compact('cannabinoids', 'strains'));
    }

    public function view($slug) {
        $cannabinoid = Cannabinoid::where('slug', $slug)->where('active', 1)->firstOrFail();
        $strains = Strain::where('cannabinoid_id', $cannabinoid->id)->where('active', 1)->inRandomOrder()->limit(8)->get();

        return view('client.cannabinoid.view', compact('cannabinoid', 'strains'));
    }

    public function list() {
        $cannabinoids = Cannabinoid::paginate(10);

        return view('dashboard.cannabinoids.list', compact('cannabinoids'));
    }

    public function edit($cannabinoid_id) {
        $cannabinoid = Cannabinoid::findOrFail($cannabinoid_id);

        return view('dashboard.cannabinoids.edit', compact('cannabinoid'));
    }

    public function update(Request $request, $cannabinoid_id) {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:30'],
            'slug' => ['required', 'min:3', 'max:255', 'unique:cannabinoids,slug,' . $cannabinoid_id],
            'status' => ['required', 'integer']
        ]);

        $cannabinoid = Cannabinoid::findOrFail($cannabinoid_id);

        $cannabinoid->title = $request->title;
        $cannabinoid->description = $request->description;
        $cannabinoid->slug = $request->slug;
        $cannabinoid->active = $request->status;

        $cannabinoid->meta()->sync([
            'title' => $request->meta_title ?? $request->title,
            'description' => $request->meta_description ?? null,
            'no_index' => $request->no_index ?? false,
            'no_follow' => $request->no_follow ?? false
        ]);

        if($cannabinoid->save()) {
            return redirect()->route('dashboard.cannabinoids')->with("success", "Запис [$cannabinoid->id] успішно оновленно");
        }
    }
}
