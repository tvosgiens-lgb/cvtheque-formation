{{-- Directive Blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison @yield --}}
@section('contenu')


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-8">

                <select onchange="location.href=this.value" class="form-select">

                    <option value="{{route('professionnels.index')}}"
                            {{--                         Item sélectionné uniquement lorsque le slug est absent--}}
                            {{--                         La commande @unless() vérifie si notre expression renvoie FAUX puis affiche
                                                         les données en suivant. Si l'expression renvoie VRAI elle ignorera la partie intérieure.
                                                         Ici, si $slug n'existe pas alors on se positionne sur "Tous les métiers" --}}
                            @unless($slug) selected @endunless>

                        Tous les métiers
                    </option>
                    @foreach($metiers as $metier)
                        <option value="{{route('professionnels.metier', ['slug' => $metier->slug])}}"
                            {{($slug == $metier->slug) ? 'selected' : '' }}>

                            {{$metier->libelle}}

                        </option>
                    @endforeach

                </select>

            </div>

            <div class="offset-2 col-lg-2 mb-4 float-end">
                <a href="{{route('professionnels.create')}}" class="btn btn-primary float-end">Créer un
                    professionnel</a>
            </div>
        </div>
    </div>

    {{-- ICI LA GESTION DES MESSAGES D'INFORMATION  --}}
    @if(session('information'))
        <div class="bs-docs-section pos-bloc-section">
            <div class="alert alert-dismissible alert-success">
                <h4 class="alert-heading">Information : </h4>
                <p class="mb-0">{{session('information')}} </p>
            </div>
        </div>
    @endif
    {{-- FIN GESTION INFO --}}

    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12 mb-4 ">


                <form action="{{route('professionnels.competence')}}" method="post">
                    @csrf
                    @method('GET')
                    <div class="row">
                        <div class="col-lg-8">
                            <input type="text" name="rechercheProfessionnels" id="rechercheProfessionnels"
                                   class="form-control" placeholder="Saisir une compétence"
                                   value="{{old('rechercheProfessionnels')}}">
                        </div>
                        <div class="offset-2 col-lg-2 mb-4 float-end">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>


    <div class="bs-docs-section ">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Liste des professionnels</h4>
                </div>

                <div class="bs-component pos-bloc-section">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Prénom et Nom</th>
                            <th scope="col">Métier</th>
                            <th scope="col">Domiciliation</th>
                            <th scope="col">Activité formation</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--BOUCLE POUR RECUPERATION DES COMPTENCES --}}
                        {{--                        Utilisation d'une structure forelse / empty /endforelse --}}
                        @forelse($professionnels as $professionnel)
                            <tr>
                                <th scope="row">{{$professionnel->id}}</th>
                                <td><strong>{{$professionnel->prenom}} {{$professionnel->nom}}</strong></td>
                                {{--                                $professionnel->metier invoque la méthode metier du modele professionnel--}}
                                <td>{{$professionnel->metier->libelle}}</td>
                                <td>{{$professionnel->cp}} {{$professionnel->ville}}</td>
                                <td>@if($professionnel->formation == 0) Non @else Oui @endif</td>
                                <td>
                                    <form action="{{route('professionnels.show', $professionnel->id )}}"
                                          method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Consulter</button>

                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('professionnels.edit', $professionnel->id )}}"
                                          method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Modifier</button>

                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('professionnels.destroy', $professionnel->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Il n'y a aucun professionnel correspondant à votre demande.</td>
                            </tr>
                        @endforelse
                        {{-- FIN BOUCLE --}}
                        </tbody>
                    </table>

                    <footer class="pagination justify-content-center p-lg-5">
                        {{$professionnels->links()}}
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection




