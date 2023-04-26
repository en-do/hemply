<?php

namespace App\Http\Controllers;

use App\Models\Strain;
use App\Models\Phenotype;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhenotypeController extends Controller
{
    public function page() {
        $phenotypes = Phenotype::where('active', 1)->get();

        return view('client.phenotype.page', compact('phenotypes'));
    }

    public function view($slug) {
        $phenotype = Phenotype::where('slug', $slug)->where('active', 1)->firstOrFail();
        $strains = Strain::where('phenotype_id', $phenotype->id)->where('active', 1)->inRandomOrder()->limit(8)->get();

        return view('client.phenotype.view', compact('phenotype', 'strains'));
    }

    public function list() {
        $phenotypes = Phenotype::paginate(10);

        return view('dashboard.phenotypes.list', compact('phenotypes'));
    }

    public function edit($id) {
        $phenotype = Phenotype::findOrFail($id);

        return view('dashboard.phenotypes.edit', compact('phenotype'));
    }

    public function update(Request $request, $phenotype_id) {
        $request->validate([
            'icon' => ['nullable', 'image'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'intro' => ['nullable', 'string', 'min:30'],
            'description' => ['nullable', 'string', 'min:30'],
            'slug' => ['nullable', 'string', 'min:3', 'max:255', 'unique:phenotypes,slug,' . $phenotype_id],
            'color' => ['nullable', 'string', 'min:3', 'max:64'],
            'status' => ['required', 'boolean']
        ]);

        $phenotype = Phenotype::findOrFail($phenotype_id);

        $phenotype->name = $request->title;
        $phenotype->intro = $request->intro;
        $phenotype->description = $request->description;
        $phenotype->slug = $request->slug;

        if(!$request->filled('slug')) {
            $phenotype->slug = Str::slug($request->title);
        }

        $phenotype->active = $request->status;

        $meta = $phenotype->meta()->updateOrCreate([
            'id' => $phenotype->meta_id ?? null
        ],[
            'title' => $request->meta_title ?? $request->title,
            'description' => $request->meta_description ?? null,
            'no_index' => $request->no_index ?? false,
            'no_follow' => $request->no_follow ?? false
        ]);

        $phenotype->meta_id = $meta->id;

        if($phenotype->save()) {


            return redirect()->route('dashboard.phenotypes')->with("success", "Запис [$phenotype->id] успішно оновленно");
        }
    }
}
