{{-- directive de blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- directive de blade permettant l'injection du contenu de la section : liaison avec @yield --}}
@section('contenu')

    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche professionnel : Consultation</h4>
                </div>
                <div class="bs-component">
                    <form>

                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">

                                <div class="col-lg-6">
                                    {{$professionnel->metier->libelle}}
                                </div>

                                <div class="col-lg-4  offset-lg-2">

                                    <div class="form-group  mb-4">
                                        <div class="form-check form-check-inline ">
                                            <label for="formation"><strong>Actions de formation déjà effectuées
                                                    ? </strong></label>
                                        </div>

                                        <div class="form-check">

                                            @if($professionnel->formation ==1) OUI @else NON (Jamais ou trop peu) @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                            Pour relation 1-n 1-n Professionnel / Compétence--}}
                            <div class="col-lg-6">
                                <div class="form-group mb-5">
                                    <h4>Compétences</h4>
                                    @forelse($professionnel->competences as $uneCompetences)
                                        - {{$uneCompetences->intitule}} <br>
                                    @empty
                                        - Aucune compétence associée
                                    @endforelse
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           readonly
                                           name="prenom" id="prenom" value="{{$professionnel->prenom}}">

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="nom" class="col-sm-2 col-form-label">Nom : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           readonly
                                           name="nom" id="nom" value="{{$professionnel->nom}}">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="cp" class="col-sm-2 col-form-label">Code Postal : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           readonly
                                           name="cp" id="cp" value="{{$professionnel->cp}}">

                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="ville" class="col-sm-2 col-form-label">Ville : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           readonly
                                           name="ville" id="ville" value="{{$professionnel->ville}}">

                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="telephone" class="col-sm-2 col-form-label">Téléphone :
                                </label>
                                <div class="col-sm-10">
                                    <input type="tel"
                                           class="form-control"
                                           readonly
                                           name="telephone" id="telephone" value="{{$professionnel->telephone}}">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="col-sm-2 col-form-label">Email : </label>
                                <div class="col-sm-10">
                                    <input type="email"
                                           class="form-control"
                                           readonly
                                           name="email" id="email" value="{{$professionnel->email}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="naissance" class="col-sm-2 col-form-label">Date de naissance : </label>
                                <div class="col-sm-10">
                                    <input type="date"
                                           class="form-control"
                                           readonly
                                           name="naissance" id="naissance" value="{{$professionnel->naissance}}">
                                </div>
                            </div>


                            <div class="form-group mb-2">


                                <label class="col-form-label" for="domaine">Domaine de formation possible : </label>

                                @if(is_array($professionnel->domaine) && in_array('S',$professionnel->domaine))
                                    Systèmes @endif &nbsp;
                                @if(is_array($professionnel->domaine) && in_array('R',$professionnel->domaine))
                                    Réseaux @endif &nbsp;
                                @if(is_array($professionnel->domaine) && in_array('D',$professionnel->domaine))
                                    Développement @endif &nbsp;

                            </div>


                            <div class="form-group row mb-2">
                                <label for="source" class="col-sm-2 col-form-label">Source : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="source" id="source"
                                           readonly
                                           value="{{$professionnel->source}}">
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label class="col-sm-2 col-form-label" for="observation">Observations:</label>
                                <textarea class="form-control "
                                          id="observation" name="observation" readonly
                                          rows="3">{{$professionnel->observation}}</textarea>

                            </div>

                            <div class="form-group row">
                                @if(isset($professionnel->cv))

                                    <div class="col-md-8 col-form-label ">
                                        <a href="{{asset('storage/'.$professionnel->cv)}}" target="_blank">Voir le CV</a>
                                    </div>
                                @else
                                    <div class="col-md-8 col-form-label ">
                                        Il n'y a aucun CV d'associé à ce profil.
                                    </div>
                                @endif

                            </div>

                            <a href="{{route('professionnels.index')}}" class="btn btn-primary">Retour</a>


                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

@endsection




