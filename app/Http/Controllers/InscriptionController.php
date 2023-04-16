<?php

namespace App\Http\Controllers;

use App\Models\Baccalaureat;
use App\Models\Diplome;
use App\Models\Inscription;
use App\Models\Semestre;
use App\Models\Sousmodule;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // $files = Storage::disk('public')->files('uploads');
        // return view('inscription.index', ['files' => $files]);
        $users=User::all();
        $baccalaureats=Baccalaureat::all();
        $diplomes=Diplome::all();
        $semestres=Semestre::all();
        $sousmodules=Sousmodule::all();
        $documents=Document::all();

        return view('inscription.index', [
            'users' => $users,
            'baccalaureats' => $baccalaureats,
            'diplomes' => $diplomes,
            'semestres' => $semestres,
            'sousmodules' => $sousmodules,
            'documents' => $documents,
        ]);
        // return view('inscription.index',compact("users,baccalaureats,diplomes,semestres,sousmodules,documents"));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Baccalaureat
        $baccalaureat=new Baccalaureat();
        $baccalaureat->typebaccalaureat=strtoupper($request->typebaccalaureat);
        $baccalaureat->mentionbac=$request->mentionbac;
        $baccalaureat->user_id=$request->user_id;
        $baccalaureat->save();

        //Diplome
        $diplome=new Diplome();
        $diplome->typediplome=strtoupper($request->typediplome);
        $diplome->optiondiplome=strtoupper($request->optiondiplome);
        $diplome->etablissement=strtoupper($request->etablissement);
        $diplome->villeetablissement=$request->villeetablissement;
        $diplome->moyenne=$request->moyenne;
        $diplome->user_id=$request->user_id;
        $diplome->save();

        $option = $request->input('typediplome');
        //Semestre
        // if ($option == 'DEUG' || $option == 'BTS' || $option == 'DUT' ) {
        //     for ($i = 1; $i <= 4; $i++) {
        //         $semestre = new Semestre;
        //         $semestre->moyenne = $request->input('moyenne'.$i);
        //         $semestre->semestre = $request->input('semestre'.$i);
        //         $semestre->user_id=$request->user_id;
        //         $semestre->save();
        //     }

        // } else if ($option == 'DTS') {
        //     for ($i = 5; $i <= 6; $i++) {
        //         $semestre = new Semestre;
        //         $semestre->moyenne = $request->input('moyenne'.$i);
        //         $semestre->semestre = $request->input('semestre'.$i);
        //         $semestre->user_id=$request->user_id;
        //         $semestre->save();
        //     }
        // }

        //Sousmodule
        if ($option == 'DEUG') {
            for ($i = 1; $i <= 4; $i++) {
                $semestre = new Semestre;
                $semestre->moyenne = $request->input('moyenne'.$i);
                $semestre->semestre = $request->input('semestre'.$i);
                $semestre->user_id=$request->user_id;
                $semestre->save();
            }
            for ($i = 1; $i <= 5; $i++) {
                $sousmodule = new Sousmodule;
                $sousmodule->note = $request->input('deugnote'.$i);
                $sousmodule->sousmodule = $request->input('deugmatiere'.$i);
                $sousmodule->user_id=$request->user_id;
                $sousmodule->save();
            }

        } else if ($option == 'BTS') {
            for ($i = 1; $i <= 4; $i++) {
                $semestre = new Semestre;
                $semestre->moyenne = $request->input('moyenne'.$i);
                $semestre->semestre = $request->input('semestre'.$i);
                $semestre->user_id=$request->user_id;
                $semestre->save();
            }
            for ($i = 1; $i <= 9; $i++) {
                $sousmodule = new Sousmodule;
                $sousmodule->note = $request->input('btsnote'.$i);
                $sousmodule->sousmodule = $request->input('btsmatiere'.$i);
                $sousmodule->user_id=$request->user_id;
                $sousmodule->save();
            }
        } else if ($option == 'DUT') {
            for ($i = 1; $i <= 4; $i++) {
                $semestre = new Semestre;
                $semestre->moyenne = $request->input('moyenne'.$i);
                $semestre->semestre = $request->input('semestre'.$i);
                $semestre->user_id=$request->user_id;
                $semestre->save();
            }
            for ($i = 1; $i <= 6; $i++) {
                $sousmodule = new Sousmodule;
                $sousmodule->note = $request->input('dutnote'.$i);
                $sousmodule->sousmodule = $request->input('dutmatiere'.$i);
                $sousmodule->user_id=$request->user_id;
                $sousmodule->save();
            }
        } else if ($option == 'DTS') {
            for ($i = 5; $i <= 6; $i++) {
                $semestre = new Semestre;
                $semestre->moyenne = $request->input('moyenne'.$i);
                $semestre->semestre = $request->input('semestre'.$i);
                $semestre->user_id=$request->user_id;
                $semestre->save();
            }
            for ($i = 1; $i <= 8; $i++) {
                $sousmodule = new Sousmodule;
                $sousmodule->note = $request->input('dtsnote'.$i);
                $sousmodule->sousmodule = $request->input('dtsmatiere'.$i);
                $sousmodule->user_id=$request->user_id;
                $sousmodule->save();
            }
        }
        
        //Document
        if($request->hasFile('file1')){
            $path1=$request->file('file1');
            $path1Name=time().".".$path1->extension();
            $request->file1->move(public_path('/document'),$path1Name);
            $path2=$request->file('file2');
            $path2Name=time()."1.".$path2->extension();
            $request->file2->move(public_path('/document'),$path2Name);
            $path3=$request->file('file3');
            $path3Name=time()."2.".$path3->extension();
            $request->file3->move(public_path('/document'),$path3Name);
            $path4=$request->file('file4');
            $path4Name=time()."3.".$path4->extension();
            $request->file4->move(public_path('/document'),$path4Name);
            $path5=$request->file('file5');
            $path5Name=time()."4.".$path5->extension();
            $request->file5->move(public_path('/document'),$path5Name);
            Document::create([
                'photo' => '/document/'.$path1Name,
                'relves' => '/document/'.$path2Name,
                'baccalaureat' => '/document/'.$path3Name,
                'demande' => '/document/'.$path4Name,
                'diplome' => '/document/'.$path5Name,
                'user_id' => $request->user_id,
            ]);
        }
        else{
            Document::create([
                'photo' => null,
                'relves' => null,
                'baccalaureat' => null,
                'demande' => null,
                'diplome' => null,
                'user_id' => $request->user_id,
        ]);}
        
        return redirect('inscription');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('inscription.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user=User::find($id);
        $baccalaureat=Baccalaureat::where('user_id',$id)->first();
        $diplome=Diplome::where('user_id',$id)->first();
        $semestre=Semestre::where('user_id',$id)->get();
        $sousmodule=Sousmodule::where('user_id',$id)->get();
        $document=Document::where('user_id',$id)->first();
        return view('inscription.edit',[
            'user' => $user,
            'baccalaureat' => $baccalaureat,
            'diplome' => $diplome,
            'semestre' => $semestre,
            'sousmodule' => $sousmodule,
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->nom = strtoupper($request->input('nom'));
        $user->prenom = strtoupper($request->input('prenom'));
        $user->codemassar = strtoupper($request->input('codemassar'));
        $user->cin = strtoupper($request->input('cin'));
        $user->datenaissance = $request->input('datenaissance');
        $user->lieunaissance = $request->input('lieunaissance');
        $user->ville = $request->input('ville');
        $user->sexe = $request->input('sexe');
        $user->adresse = $request->input('adresse');
        $user->telephone = $request->input('telephone');
        $user->save();

        $baccalaureat = Baccalaureat::where('user_id', $id)->first();
        $baccalaureat->typebaccalaureat = strtoupper($request->input('typebaccalaureat'));
        $baccalaureat->mentionbac = $request->input('mentionbac');
        $baccalaureat->save();

        $diplome = Diplome::where('user_id', $id)->first();
        $diplome->optiondiplome = strtoupper($request->input('optiondiplome'));
        $diplome->etablissement = strtoupper($request->input('etablissement'));
        $diplome->villeetablissement = $request->input('villeetablissement');
        $diplome->moyenne = $request->input('moyenne');
        $diplome->save();

        $semestres = Semestre::where('user_id', $id)->get();
        foreach ($semestres as $key => $semestre) {
            $semestre->moyenne = $request->input('moyenne'.$key+1 );
            $semestre->save();
        }

        $sousmodules = Sousmodule::where('user_id', $id)->get();
        foreach ($sousmodules as $key => $sousmodule) {
            $sousmodule->note = $request->input('note'.$key+1 );
            $sousmodule->save();
        }


        $document = Document::where('user_id', $id)->first();
        if ($request->hasFile('file1')) {
            if (File::exists(public_path($document->photo))) {
                File::delete(public_path($document->photo));
            }
            $path1 = $request->file('file1');
            $path1Name = time() . "." . $path1->extension();
            $path1->move(public_path('/document'), $path1Name);
            $document->photo = '/document/' . $path1Name;
        }

        // Update file2 if it exists
        if ($request->hasFile('file2')) {
            if (File::exists(public_path($document->relves))) {
                File::delete(public_path($document->relves));
            }
            $path2 = $request->file('file2');
            $path2Name = time() . "1." . $path2->extension();
            $path2->move(public_path('/document'), $path2Name);
            $document->relves = '/document/' . $path2Name;
        }

        // Update file3 if it exists
        if ($request->hasFile('file3')) {
            if (File::exists(public_path($document->baccalaureat))) {
                File::delete(public_path($document->baccalaureat));
            }
            $path3 = $request->file('file3');
            $path3Name = time() . "2." . $path3->extension();
            $path3->move(public_path('/document'), $path3Name);
            $document->baccalaureat = '/document/' . $path3Name;
        }

        // Update file4 if it exists
        if ($request->hasFile('file4')) {
            if (File::exists(public_path($document->demande))) {
                File::delete(public_path($document->demande));
            }
            $path4 = $request->file('file4');
            $path4Name = time() . "3." . $path4->extension();
            $path4->move(public_path('/document'), $path4Name);
            $document->demande = '/document/' . $path4Name;
        }

        // Update file5 if it exists
        if ($request->hasFile('file5')) {
            if (File::exists(public_path($document->diplome))) {
                File::delete(public_path($document->diplome));
            }
            $path5 = $request->file('file5');
            $path5Name = time() . "4." . $path5->extension();
            $path5->move(public_path('/document'), $path5Name);
            $document->diplome = '/document/' . $path5Name;
        }
        $document->save();

        return redirect('inscription');
        

    }
}
