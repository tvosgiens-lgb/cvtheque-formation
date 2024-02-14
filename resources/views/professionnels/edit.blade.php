{{-- directive de blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- directive de blade permettant l'injection du contenu de la section : liaison avec @yield --}}
@section('contenu')

    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche professionnel : Modification</h4>
                </div>
                <div class="bs-component">
                    <form method="post"
                          action="{{route('professionnels.update', ['professionnel'=>$professionnel->id])}}"
                    enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">

                                <div class="col-lg-6">

                                    {{--                le champ ne peut être en erreur le choix du mérier a déjà été effectué--}}
                                    {{--                           Cette Syntaxe pose un problème de repositionnement  en cas d'une saisie invalide
                                                                    sur une rubrique du formulaire.
                                                                    En fonction de sa position dans la liste le "old metier" ne sera pas reproposé.
                                                                    Ex "analyste" est old metier et "technicien" est celui encore en BD c'est ce dernier
                                                                    qui aura priorité et restera selected !--}}
                                    {{--                                    <select name="metier_id" class="form-select">--}}

                                    {{--                                        @foreach($metiers as $metier)--}}

                                    {{--                                            <option value="{{$metier->id}}"--}}
                                    {{--                                                    @if(old('metier_id')==$metier->id || $professionnel->metier->id == $metier->id) selected @endif>--}}

                                    {{--                                                {{$metier->libelle}}--}}
                                    {{--                                            </option>--}}

                                    {{--                                        @endforeach--}}
                                    {{--                                    </select>--}}

                                    <select name="metier_id" class="form-select">

                                        <option value="{{$professionnel->metier->id}}" selected>

                                            {{$professionnel->metier->libelle}}

                                        </option>

                                        @foreach($metiers as $metier)

                                            @if($professionnel->metier->id != $metier->id )

                                                <option value="{{$metier->id}}"
                                                        @if(old('metier_id')==$metier->id) selected @endif>

                                                    {{$metier->libelle}}

                                                </option>

                                            @endif

                                        @endforeach
                                    </select>

                                </div>


                                <div class="col-lg-4  offset-lg-2">

                                    <div class="form-group  mb-4">
                                        <div class="form-check form-check-inline ">
                                            <label for="formation"><strong>Actions de formation déjà effectuées
                                                    ? </strong></label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" id="formation1" name="formation"
                                                   class="form-check-input" value="1"
                                                   @if(old('formation')==1 || $professionnel->formation == 1) checked @endif >
                                            <label class="form-check-label" for="formation1">Oui (déjà
                                                effectuées)</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="formation2" name="formation"
                                                   class="form-check-input" value="0"
                                                   @if(old('formation', $professionnel->formation) ==0) checked @endif >
                                            <label class="cform-check-label" for="formation2">Non (jamais ou trop
                                                peu)</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

 {{--                            Pour relation 1-n 1-n Professionnel / Compétence--}}
                            <div class="form-group row  mb-3">
                                <div class="col-lg-12">
 {{--                              {{POUR VERIFIER : implode(',',$professionnel->competences->pluck('id')->toArray() )}}--}}
                                    <select data-none-selected-text="Compétences"
                                            data-live-search="true" class="selectpicker form-control" name="comp[]"
                                            multiple>
                                        @foreach($competences as $competence)
                                            <option value="{{$competence->id}}"
 {{--                                     Si old('comp') existe, il faut rechercher dans ce tableau sinon dans
                                     les différentes compétences du professionnel. Toutefois, celles-ci retournant une collection d'objet
                                     il est nécessaire de récupérer l'id de chaque objet et de convertir les données en tableau--}}
                                                {{in_array($competence->id,  old('comp') ?  old('comp') :
                                                            $professionnel->competences->pluck('id')->toArray()) ?  'selected': '' }}>
                                                {{$competence->intitule}}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('comp')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('prenom')is-invalid @enderror"
                                           placeholder="Un prénom"
                                           name="prenom" id="prenom" value="{{old('prenom', $professionnel->prenom)}}">

                                    @error('prenom')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="nom" class="col-sm-2 col-form-label">Nom : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('nom')is-invalid @enderror"
                                           placeholder="Un nom"
                                           name="nom" id="nom" value="{{old('nom', $professionnel->nom)}}">
                                    @error('nom')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="cp" class="col-sm-2 col-form-label">Code Postal : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('cp')is-invalid @enderror"
                                           placeholder="Un code postal"
                                           name="cp" id="cp" value="{{old('cp', $professionnel->cp)}}">
                                    @error('cp')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="ville" class="col-sm-2 col-form-label">Ville : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('ville')is-invalid @enderror"
                                           placeholder="Ville"
                                           name="ville" id="ville" value="{{old('ville', $professionnel->ville)}}">
                                    @error('ville')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="telephone" class="col-sm-2 col-form-label">Téléphone :
                                </label>
                                <div class="col-sm-10">
                                    <input type="tel"
                                           class="form-control @error('telephone')is-invalid @enderror"
                                           placeholder="Un téléphone fixe ou mobile"
                                           name="telephone" id="telephone"
                                           value="{{old('telephone', $professionnel->telephone)}}">
                                    @error('telephone')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="col-sm-2 col-form-label">Email : </label>
                                <div class="col-sm-10">
                                    <input type="email"
                                           class="form-control @error('email')is-invalid @enderror"
                                           placeholder="une adresse mail valide"
                                           name="email" id="email" value="{{old('email', $professionnel->email)}}">
                                    @error('email')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="naissance" class="col-sm-2 col-form-label">Date de naissance : </label>
                                <div class="col-sm-10">
                                    <input type="date"
                                           class="form-control @error('naissance')is-invalid @enderror"
                                           placeholder="Une date de naissance"
                                           name="naissance" id="naissance"
                                           value="{{old('naissance', $professionnel->naissance)}}">

                                    @error('naissance')
                                    <p class="text-danger" role="alert">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group mb-2">


                                <label class="col-form-label" for="domaine">Domaine de formation possible : </label>


                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="domaine1" name="domaine[]"
                                           value="S"
                                        {{ (is_array(old('domaine', $professionnel->domaine)) && in_array('S', old('domaine', $professionnel->domaine))) ? ' checked' : '' }}>
                                    <label class="form-check-label @error('domaine') text-danger @enderror"
                                           for="domaine1">Systèmes</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="domaine2" name="domaine[]"
                                           value="R"
                                        {{ (is_array(old('domaine', $professionnel->domaine)) && in_array('R', old('domaine', $professionnel->domaine))) ? ' checked' : '' }}>
                                    <label class="form-check-label @error('domaine') text-danger @enderror"
                                           for="domaine2">Réseaux</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="domaine3" name="domaine[]"
                                           value="D"
                                        {{ (is_array(old('domaine', $professionnel->domaine)) && in_array('D', old('domaine', $professionnel->domaine))) ? ' checked' : '' }}>
                                    <label class="form-check-label @error('domaine') text-danger @enderror"
                                           for="domaine3">Développement</label>
                                </div>
                                @error('domaine')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>


                            <div class="form-group row mb-2">
                                <label for="source" class="col-sm-2 col-form-label">Source : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="source" id="source"
                                           placeholder="Réseaux sociaux, nom d'un partenaire, annonce, ..."
                                           value="{{old('source', $professionnel->source)}}">
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label class="col-sm-2 col-form-label" for="observation">Observations:</label>
                                <textarea class="form-control "
                                          id="observation" name="observation" placeholder="Observations / Commentaires"
                                          rows="3">{{old('observation',$professionnel->observation)}}</textarea>

                            </div>

                            @if($professionnel->cv)
                                <a href="{{asset('storage/'.$professionnel->cv)}}" target="_blank">Le curriculum vitae est visible ici</a>
                            @else
                                Ce professionnel n'a pas encore proposé son CV
                            @endif

                            <div class="form-group"></div>

                            <div class="form-group row">
                                <label for="cv" class="col-md-2 col-form-label text-left">Joindre le CV : </label>
                                <div class="col-md-8 col-form-label ">
                                    <input type="file" class="@error('cv') text-danger @enderror"
                                           id="cv"
                                           name="cv"
                                           value="">
                                    @error('cv')
                                    <p class="text-danger" role="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <a href="{{route('professionnels.index')}}" class="btn btn-primary">Retour</a>
                            <button type="submit" class="btn btn-primary float-end">Modifier</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

@endsection





