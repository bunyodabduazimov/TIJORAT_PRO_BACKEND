<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reference;

class ReferenceController extends Controller
{
    public function index(Request $request)
    {
        return Reference::query()
        ->where('type', $request->type)
        ->when($request->search, fn($q) =>
            $q->where('name', 'like', "%{$request->search}%")
        )
        ->when($request->parent_id, fn($q) =>
            $q->where('parent_id', $request->parent_id)
        )
        ->limit($request->limit ?? 20)
        ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        return Reference::create([
            'company_id' => auth()->user()->company_id,
            'name' => $request->name,
            'active' => true
        ]);
    }
}
