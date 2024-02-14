<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Professionnel,
    Metier,
    Competence,
};

use App\Http\Requests\ProfessionnelRequest;

//Pour la recherche d'un professionnel sur prénom / nom
use Illuminate\Support\Facades\DB;

use Storage, Str;


class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug = "")
    {
        //         echo "Vers la liste des professionnels";

        //Paramètre entrant Request $request uniquement lors de la gestion du bouton recherche Professionnel !

//        $professionnels = $slug ?
//            Metier::where('slug', $slug)->firstOrFail()->professionnels()->paginate(5) :
//            Professionnel::paginate(5);
//
//        //Pour alimentation du combo métiers
//        $metiers = Metier::orderBy('libelle')->get();
//
//        $data = [
//            'title' => 'Les professionnels de la ' . config('app.name'),
//            'description' => 'Retrouver tous les professionnels de la ' . config('app.name'),
//            'professionnels' => $professionnels,
//            'metiers' => $metiers,
//            'slug' => $slug,
//        ];
//
//
//        return view('professionnels.index', $data);

//        Pour la recherche d'un professionnel... Réécriture :
//        =================================
        //Pour alimentation du combo métiers
        $metiers = Metier::orderBy('libelle')->get();


        if ($request->input('search')) {
//            Pour insérer une chaîne arbitraire dans une requête, il faut
//            créer une expression de chaîne "en dur" et utiliser
//            la méthode raw() fournie par la façade DB :
//            https://laravel.com/docs/8.x/queries#raw-methods

            $professionnels = Professionnel::where(
                DB::raw('CONCAT(prenom, " ", nom)'), 'LIKE', '%' . $request->input('search') . '%')
                ->orderBy('nom')->paginate(20);
        } else {

            $professionnels = $slug ?
                Metier::where('slug', $slug)->firstOrFail()->professionnels()->paginate(5) :
                Professionnel::paginate(5);
        }



        $data = [
            'title' => 'Les professionnels de la ' . config('app.name'),
            'description' => 'Retrouver tous les professionnels de la ' . config('app.name'),
            'professionnels' => $professionnels,
            'metiers' => $metiers,
            'slug' => $slug,
        ];


        return view('professionnels.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metiers = Metier::orderBy('libelle')->get();
//          Autre possibilité !
//          ==================
//          $metiers = Metier::all()->sortByDesc('libelle');


//          Pour relation 1-n 1-n Professionnel / Compétence
//          ================================================
        $competences = Competence::orderBy('intitule')->get();


        $data = [
            'title' => 'Les professionnels de la ' . config('app.name'),
            'description' => 'Retrouver tous les professionnels de la ' . config('app.name'),
            'metiers' => $metiers,
//          Pour relation 1-n 1-n Professionnel / Compétence
//          ================================================
            'competences' => $competences,
        ];

        return view('professionnels.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ProfessionnelRequest $professionnelRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionnelRequest $professionnelRequest)
    {

        $validatedData = $professionnelRequest->all();
        $validatedData['domaine'] = implode(',', $professionnelRequest->input('domaine'));


//        var_dump($validatedData);

//        Professionnel::create($validatedData);


//      Pour relation 1-n 1-n Professionnel / Compétence
//      =================================================
        $newProfessionnel = Professionnel::create($validatedData);

        if($professionnelRequest->hasFile('cv')){
            $extension = $professionnelRequest->file('cv')->extension();
            //nomfichier => concaténation nom et id du nouveau professionnel : Ex lapierre-15.pdf
            $nomFichier = Str::slug($newProfessionnel->nom).'-'.$newProfessionnel->id.'.'.$extension;
            //$cheminDuFichier => répertoire curriculum/id du prof/ om du fichier
            //Ex: curriculum/15/lapierre-15.pdf
            $cheminDuFichier = $professionnelRequest->file('cv')->storeAs('curriculum/'.$newProfessionnel->id, $nomFichier);
            $newProfessionnel->cv =  $cheminDuFichier;
            $newProfessionnel->save();

        }

//      La méthode competences() du modèle Professionnel pourra jouer son rôle
//      avec la complicité de la méthode attach() proposée par Eloquent pour
//      fournir l’ensemble des compétences au professionnel.
        $newProfessionnel->competences()->attach($professionnelRequest->comp);

        $success = "Enregistrement effectué avec succès.";
        return redirect()->route('professionnels.index')->withInformation($success);
    }

    /**
     * Display the specified resource.
     *
     * @param object $professionnel
     * @return \Illuminate\Http\Response
     */
    public function show(Professionnel $professionnel)
    {

        $professionnel->domaine = explode(',', $professionnel->domaine);

        $data = [
            'title' => 'Les professionnels de la ' . config('app.name'),
            'description' => 'Retrouver tous les professionnels de la ' . config('app.name'),
            'professionnel' => $professionnel,
        ];

        return view('professionnels.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     * @param object $professionnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Professionnel $professionnel)
    {

        $professionnel->domaine = explode(',', $professionnel->domaine);

        $metiers = Metier::orderBy('libelle')->get();

//          Pour relation 1-n 1-n Professionnel / Compétence
//          ================================================
        $competences = Competence::orderBy('intitule')->get();

        $data = [
            'title' => 'Les professionnels de la ' . config('app.name'),
            'description' => 'Retrouver tous les professionnels de la ' . config('app.name'),
            'metiers' => $metiers,
//          Pour relation 1-n 1-n Professionnel / Compétence
//          ================================================
            'competences' => $competences,
            'professionnel' => $professionnel,
        ];
        return view('professionnels.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\ProfessionnelRequest $professionnelRequest
     * @param object $professionnel
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionnelRequest $professionnelRequest, Professionnel $professionnel)
    {
        $validatedData = $professionnelRequest->all();

        $validatedData['domaine'] = implode(',', $professionnelRequest->input('domaine'));

        //Pour CV et créatio de l'URL à mémoriser
        if($professionnelRequest->hasFile('cv')){

            $extension = $professionnelRequest->file('cv')->extension();
            //id nom modifiable => $professionnel->id
            $nomFichier = Str::slug($professionnelRequest->nom) .'-'.$professionnel->id.'.'.$extension;

            $cheminDuFichier = $professionnelRequest->file('cv')->storeAs('curriculum/'.$professionnel->id, $nomFichier);

            $validatedData['cv'] =  $cheminDuFichier;

        }
        //Modificatio de l'enregistrement
        $professionnel->update($validatedData);
        //Mise à jour de la table pivot
        $professionnel->competences()->sync($professionnelRequest->comp);

        $success = "Modification effectuée avec succès.";

        return redirect()->route('professionnels.index')->withInformation($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object $professionnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professionnel $professionnel)
    {
        if(Storage::exists('curriculum/'.$professionnel->id)){
            //Storage pointe vers ... storage !
            Storage::deleteDirectory('curriculum/'.$professionnel->id);
        }

        $professionnel->delete();

        return back()->withInformation("Le professionnel a été supprimé");
    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        //Pour alimentation du combo métiers
        $metiers = Metier::orderBy('libelle')->get();
        $slug = null;

        if ($request->input('rechercheProfessionnels')) {
            //Requête attendue :
//            SELECT prenom, nom FROM competences c, professionnels p,competence_professionnel cp
//               WHERE c.id = cp.competence_id AND p.id = cp.professionnel_id AND c.libelle LIKE '%sql%'; ...par exemple !
//
//            $professionnels = DB::table('competences')
//                ->join('competence_professionnel', 'competences.id', '=', 'competence_professionnel.competence_id')
//                ->join('professionnels', 'professionnels.id', '=', 'competence_professionnel.professionnel_id')
//                ->join('metiers', 'professionnels.metier_id', '=', 'metiers.id')
//                ->where('competences.intitule', 'LIKE', '%' .$request->input('rechercheProfessionnels') . '%')
//                ->select('professionnel.id','professionnel.prenom', 'professionnel.nom')->distinct()
//                ->paginate(10);

            $search = $request->input('rechercheProfessionnels');
            $professionnels = Professionnel::whereHas('competences', function($q) use ($search)
            {
                $q->where('intitule', 'LIKE', '%'.$search.'%');
            })->paginate(5);
//            foreach ($professionnels as $professionnel) {
//                echo $professionnel->nom, '<br>';
//            }


        }


        $data = [
            'title' => 'Les professionnels de la ' . config('app.name'),
            'description' => 'Retrouver tous les professionnels de la ' . config('app.name'),
            'professionnels' => $professionnels,
            'metiers' => $metiers,
            'slug' => $slug,
        ];


        return view('professionnels.index', $data);
    }
}
