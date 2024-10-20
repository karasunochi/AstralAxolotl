<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchivePhoto ;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        $mediaItems = ArchivePhoto ::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        return view('archive', compact('mediaItems'));
    }
}
