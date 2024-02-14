{{-- Directive Blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison @yield --}}
@section('contenu')

    {{--ICI LA GESTION D'UNCHAMP RECHERCHE COMPETENCE--}}
    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            {{--            Pour l'exercice sur la recherche d'une compétence--}}
            <div class="col-lg-10">
                <form action="{{route('competence.search')}}" method="POST" class="">
                    @method('GET')
                    @csrf
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="search" id="search" value="{{$search}}"
                                   placeholder="Rechercher une compétence">
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            {{--            Fin exercice recherche !--}}
            <div class="col-lg-2">
                <a href="{{route('competences.create')}}" class="btn btn-primary float-end">Créer une compétence</a>
            </div>
        </div>
    </div>
    {{--FIN GESTION COMPETENCE--}}

    {{-- ICI LA GESTION DES MESSAGES D'INFORMATION  --}}
    @if(session('information'))
        <div class="bs-docs-section pos-bloc-section">
            <div class="alert alert-dismissible alert-success">
                <h4 class="alert-heading">Information : </h4>
                <p class="mb-0">{{session('information')}}</p>
            </div>
        </div>
    @endif
    {{-- FIN GESTION INFO --}}

    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Liste des compétences</h4>
                </div>

                <div class="bs-component pos-bloc-section">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Intitulé</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--BOUCLE POUR RECUPERATION DES COMPTENCES --}}
                        @foreach($competences as $competence)
                            <tr>
                                <th scope="row">{{$competence->id}}</th>
                                <td><strong>{{$competence->intitule}}</strong></td>
                                <td>
                                    <form action="{{route('competences.show', $competence->id )}}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Consulter</button>

                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('competences.edit', $competence->id )}}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Modifier</button>

                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('competences.destroy', $competence->id )}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {{-- FIN BOUCLE --}}
                        </tbody>
                    </table>
                    <footer class="pagination justify-content-center mt-4">
                        {{$competences->links()}}
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection



