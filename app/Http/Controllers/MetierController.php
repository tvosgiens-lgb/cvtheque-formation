<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Metier,
};

use App\Http\Requests\MetierRequest;


class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "ICI la liste";
        $metiers = Metier::orderBy('libelle')->get();
        $data = [
            'title' => 'Les métiers de la ' . config('app.name'),
            'description' => 'Retrouver toutes les métiers de la ' . config('app.name'),
            'metiers' => $metiers,
        ];

        return view('metiers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "ICI formulaire en création";
        $data = [
            'title' => 'Les métiers de la ' . config('app.name'),
            'description' => 'Retrouver toutes les métiers de la ' . config('app.name'),
        ];
        return view('metiers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MetierRequest $metierRequest
     * @return \Illuminate\Http\Response
     */
    public function store(MetierRequest $metierRequest)
    {
        // echo "ICI l'enregistrement des données.";
        Metier::create($metierRequest->all());
        return redirect()->route('metiers.index')
            ->withInformation("Enregistrement effectué avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  object $metier
     * @return \Illuminate\Http\Response
     */
    public function show(Metier $metier)
    {
//        echo "ICI la consultation d'une fiche métier.";
        $data = [
            'title' => 'Les métiers de la ' . config('app.name'),
            'description' => 'Retrouver toutes les métiers de la ' . config('app.name'),
            'metier' => $metier,
        ];

        return view('metiers.show', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  object $metier
     * @return \Illuminate\Http\Response
     */
    public function edit(Metier $metier)
    {
//        echo "ICI formulaire en modification";
        $data = [
            'title' => 'Les métiers de la ' . config('app.name'),
            'description' => 'Retrouver toutes les métiers de la ' . config('app.name'),
            'metier' => $metier,
        ];
//        test avant la création de la vue :
//        echo "Vers la fiche en édition";

        return view('metiers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\MetierRequest $metierRequest
     * @param  object $metier
     * @return \Illuminate\Http\Response
     */
    public function update(MetierRequest $metierRequest, Metier $metier)
    {
//        echo "ICI la modification en BD";

        $metier->update($metierRequest->all());

        return redirect()->route('metiers.index')->withInformation("Modification effectuée avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object $metier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metier $metier)
    {
        // echo "Enfin la suppression ...ouf !";
        $metier->delete();
        return redirect()->route('metiers.index')
            ->withInformation("Le métier a été supprimé avec succès.");
    }

    /** EXERCICE 3 et la suppression indirecte */
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  object $metier
     * @return \Illuminate\Http\Response
     */
    public function delete(Metier $metier){
//        echo "ICI formulaire en suppression";
        $data = [
            'title' => 'Les métiers de la ' . config('app.name'),
            'description' => 'Retrouver toutes les métiers de la ' . config('app.name'),
            'metier' => $metier,
        ];
//        dd($metier->id);

//        test avant la création de la vue :
//        echo "Vers la fiche en suppression";
        return view('metiers.delete', $data);
    }

}
