<?php

namespace App\Http\Controllers;

use App\Models\Cannabinoid;
use App\Models\Effect;
use App\Models\Phenotype;
use App\Models\Strain;
use App\Models\Terpene;
use Illuminate\Http\Request;

class StrainController extends Controller
{
    public function list() {
        $strains = Strain::paginate(15);

        return view('dashboard.strains.list', compact('strains'));
    }

    public function add() {
        $phenotypes = Phenotype::where('active', 1)->get();

        return view('dashboard.strains.add', compact('phenotypes'));
    }

    public function edit() {
        $phenotypes = Phenotype::where('active', 1)->get();

        return view('dashboard.strains.edit', compact('phenotypes'));
    }

    public function create(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:128'],
            'aka_name' => ['nullable', 'string', 'min:3', 'max:128'],
            'image' => ['required'],
            'description' => ['nullable', 'string', 'min:20'],
            'type' => ['required', 'integer'],
            'phenotype' => ['required'],
            'terpene' => ['required'],
            'cannabinoid' => ['required'],
            'slug' => ['required', 'string', 'unique:strains'],
            'status' => ['required', 'boolean']
        ]);

        $strain = new Strain;

        if($strain->save()) {
            return redirect()->route('dashboard.strains')->with('status', "Strain $strain->id created");
        }
    }

    public function update(Request $request, $strain_id) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:128'],
            'aka_name' => ['nullable', 'string', 'min:3', 'max:128'],
            'image' => ['required'],
            'description' => ['nullable', 'string', 'min:20'],
            'type' => ['required', 'integer'],
            'phenotype' => ['required'],
            'terpene' => ['required'],
            'cannabinoid' => ['required'],
            'slug' => ['required', 'string', 'unique:strains,' . $strain_id],
            'status' => ['required', 'boolean']
        ]);

        $strain = Strain::findOrFail($strain_id);

        $meta = $strain->meta()->updateOrCreate([
            'id' => $strain->meta_id ?? null
        ],[
            'title' => $request->meta_title ?? $request->title,
            'description' => $request->meta_description ?? null,
            'no_index' => $request->no_index ?? false,
            'no_follow' => $request->no_follow ?? false
        ]);

        $strain->meta_id = $meta->id;

        if($strain->save()) {
            return redirect()->route('dashboard.strains')->with('status', "Strain $strain->id created");
        }
    }


    public function cannabinoids(Request $request) {
        $cannabinoids = Cannabinoid::where('active', 1)->get();

        if($cannabinoids->count() > 0) {
            return response()->json($cannabinoids, 200);
        }

        return response()->json([], 404);
    }

    public function terpenes(Request $request) {
        $terpenes = Terpene::where('active', 1)->get();

        if($terpenes->count() > 0) {
            return response()->json($terpenes, 200);
        }

        return response()->json([], 404);
    }

    public function effects(Request $request) {
        $effects = Effect::where('active', 1)->get();

        if($effects->count() > 0) {
            return response()->json($effects, 200);
        }

        return response()->json([], 404);
    }
}
