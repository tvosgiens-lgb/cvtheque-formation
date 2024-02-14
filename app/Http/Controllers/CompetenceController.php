<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Competence,
};

use App\Http\Requests\CompetenceRequest;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // echo "J'y Suis";
        // ============================= DEBUT DES EXEMPLES =============================

        // dd() Dump and Die
        // dd(Competence::all());
        // dd(Competence::get());

//        $competences = Competence::get();
//        ou
//        $competences = Competence::all();
//        $competences = Competence::all('intitule');

//        $competences = Competence::orderBy('id','desc')->get();
//        //Identique
//        $competences = Competence::orderByDesc('id')->get();

//        $competences = Competence::where('intitule', '=', 'Scrum')->get();
//
//        $competences = Competence::where('created_at', '>=', '2020-05')->get();

//        $competences = Competence::orderByDesc('intitule')->get();

//        $competences = Competence::where('intitule', 'LIKE', 'sql%')->get();
//        $competences = Competence::where('intitule', 'LIKE', '%sql')->get();
//        $competences = Competence::where('intitule', 'LIKE', '%sql%')->get();

//        $competences = Competence::orderByDesc('id')->take(5)->get();
//        ou identique
//        $competences = Competence::orderByDesc('id')->limit(5)->get();

//        Pour info : offset est rendu par skip() ou offset()

//        $competences = Competence::count();
//        En combinant les clauses restrictives
//        $competences = Competence::where('intitule', 'LIKE', '%sql%')->count();
//        dd($competences);


//        Recherche d'un seul enregistrement sur son id
//        $competences = Competence::find(31);
//        ou retourner une page 404 si non trouvé
//        $competences = Competence::findOrFail(48);
//        Recupérer la première compétence
//        $competences = Competence::first();
//        Recupérer la dernière compétence !
//        $competences = Competence::orderByDesc('id')->first();

//        dd($competences);
//        echo $competences->intitule;


//        foreach($competences as $competence){
//
//            echo $competence->intitule . " / " .  $competence->created_at ."<br>";
//            var_dump($competence->intitule);
//            dump($competence->intitule);
//
//        }


        // =============================     FIN DES EXEMPLES    =============================

        // ============================= APRES AVOIR CREE LA VUE =============================

//        // Choix de la récupération des données :
//        $competences = Competence::orderBy('intitule')->get();
//        $competences = Competence::orderBy('intitule')->paginate(5);
// //       // Une première solution qui consiste à envoyer directement la collection $competences
////      // à la vue :
//       // return view('competences.index', compact('competences'));
//
//        // Une autre possibilité est de créer en amont un tableau, permettant ainsi de passer
//        // si nécessaire des valeurs supplémentaires exemple ... config('app.name') dans .env
//        // il faut modifier la vue Cvtheque !
//        $data = [
//            'title' => 'Les compétences de la ' . config('app.name'),
//            'description' => 'Retrouver toutes les compétences de la ' . config('app.name'),
//            'competences' => $competences,
//        ];
//
//        return view('competences.index', $data);

        //        Pour la recherche... Réécriture :
//        =================================

        if($request->input('search')){
//            $competences = Competence::where('intitule', 'LIKE', '%' . $request->input('search') .'%')
//                ->orderBy('intitule')->get();
            $competences = Competence::where('intitule', 'LIKE', '%' . $request->input('search') .'%')
                ->orderBy('intitule')->paginate(5);
        }else{
//            $competences = Competence::orderBy('intitule')->get();
            $competences = Competence::orderBy('intitule')->paginate(5);
        }

        $data = [
            'title' => 'Les compétences de la ' . config('app.name'),
            'description' => 'Retrouver toutes les compétences de la ' . config('app.name'),
            'competences' => $competences,
            'search' =>$request->input('search')?:'',
        ];

        return view('competences.index', $data);


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo "En création";
        $data = [
            'title' => 'Les compétences de la ' . config('app.name'),
            'description' => 'Retrouver toutes les compétences de la ' . config('app.name'),
        ];
        return view('competences.create', $data);

    }

    /**
     * @param App\Http\Requests\CompetenceRequest $competenceRequest
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $competenceRequest)
    {
        //        echo " En création ICI !";
//        Récupération dans un tableau des données validées
//        $validatedData = $competenceRequest->validated();
 //       $validatedData = $competenceRequest->all();
//        dd($validatedData);
//        $validatedData est bien un tableau
//        echo  $validatedData['description'];
//        Competence::create($validatedData);
//        return redirect()->route('competences.index')
//              ->with('information', 'Enregistrement effectué avec succès.');
//        $success = "Enregistrement effectué avec succès.";
//        return redirect()->route('competences.index')->withInformation($success);

        // Autre alternative :
//        =======================
//        instancier une nouvelle instance du modèle Competence
        //$competence = New Competence();
        // REmarquer l'appel de la classe sas les parenthèses
        $competence = New Competence;
//        définir des attributs sur le modèle
        $competence->intitule = $competenceRequest->intitule;
        $competence->description = $competenceRequest->description;
//        Ensuite, appeler la méthode save() sur l'instance du modèle Competence
        $competence->save();
//
        $success = "Enregistrement effectué avec succès.";
        return redirect()->route('competences.index')->withInformation($success);
    }

    /**
     * @param object $competence
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        //        Tester l'objet competence !
//        dd($competence);

//        1/ Solution
//        return view('competences.show', compact('competence'));

//        2/ Solution
        $data = [
            'title' => 'Les compétences de la ' . config('app.name'),
            'description' => 'Retrouver toutes les compétences de la ' . config('app.name'),
            'competence' => $competence,
        ];
//        test avant la création de la vue :
//        echo "Vers la fiche en consultation";
        return view('competences.show', $data);
    }

    /**
     * @param object $competence
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        //        Tester l'objet competence !
//        dd($competence);

//        1/ Solution
//        return view('competences.edit', compact('competence'));

//        2/ Solution
        $data = [
            'title' => 'Les compétences de la ' . config('app.name'),
            'description' => 'Retrouver toutes les compétences de la ' . config('app.name'),
            'competence' => $competence,
        ];
//          test avant la création de la vue :
//          echo "Vers la fiche en modification";
        return view('competences.edit', $data);
    }

    /**
     * @param App\Http\Requests\CompetenceRequest $competenceRequest
     * @param object $competence
     * Update the specified resource in storage.
     */
    public function update(CompetenceRequest $competenceRequest, Competence $competence)
    {
 //       $competenceRequest contient les valeurs modifiées envoyées par l'utilisateur
//        $competence contient les valeurs originales dont... l'id !
//        dd($competenceRequest, $competence);

//        $validatedData = $competenceRequest->validated()();
         $validatedData = $competenceRequest->all();
//        dd($validatedData);

        $competence->update($validatedData);

        $success = "Modification effectuée avec succès.";

        return redirect()->route('competences.index')->withInformation($success);

        // Autre alternative :
//        =======================
//        $competence->intitule = $competenceRequest->intitule;
//        $competence->description = $competenceRequest->description;
//
//        $competence->save();
//        return redirect()->route('competences.index')->withInformation('Modification effectué avec succès.');
    }

    /**
     * @param object $competence
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return back()->withInformation("La compétence a été supprimée");
    }
}
