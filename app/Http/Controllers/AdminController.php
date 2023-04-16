<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diplome;
use App\Models\Document;
use App\Models\Semestre;
use App\Models\Sousmodule;
use App\Models\Baccalaureat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users=User::all();
        $baccalaureats=Baccalaureat::all();
        $diplomes=Diplome::all();
        $semestres=Semestre::all();
        $sousmodules=Sousmodule::all();
        $documents=Document::all();
        $count = User::where('isadmin', '!=', 1)->count();

        return view('admin.index', [
            'users' => $users,
            'baccalaureats' => $baccalaureats,
            'diplomes' => $diplomes,
            'semestres' => $semestres,
            'sousmodules' => $sousmodules,
            'documents' => $documents,
            'count' => $count,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $baccalaureat=Baccalaureat::where('user_id',$id)->first();
        $diplome=Diplome::where('user_id',$id)->first();
        $semestres=Semestre::where('user_id',$id)->get();
        $sousmodules=Sousmodule::where('user_id',$id)->get();
        $document=Document::where('user_id',$id)->first();
            
        return view('admin.show', [
            'user' => $user,
            'baccalaureat' => $baccalaureat,
            'diplome' => $diplome,
            'semestres' => $semestres,
            'sousmodules' => $sousmodules,
            'document' => $document
        ]);
    }
}
