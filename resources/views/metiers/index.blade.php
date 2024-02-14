{{-- Directive Blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison @yield --}}
@section('contenu')


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            {{--            <div class="col-lg-10">--}}

            {{--            </div>--}}
            <div class="col-lg-12">
                <a href="{{route('metiers.create')}}" class="btn btn-primary float-end">Créer un métier</a>
            </div>
        </div>
    </div>

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

    <div class="bs-docs-section ">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Liste des métiers</h4>
                </div>

                <div class="bs-component pos-bloc-section">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Libellé</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--BOUCLE POUR RECUPERATION DES COMPTENCES --}}
                        @foreach($metiers as $metier)
                            <tr>
                                <th scope="row">{{$metier->id}}</th>
                                <td><strong>{{$metier->libelle}}</strong></td>
                                <td>
                                    <form action="{{route('metiers.show', $metier->id )}}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Consulter</button>

                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('metiers.edit', $metier->id )}}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Modifier</button>

                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('metiers.delete', $metier->id)}}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {{-- FIN BOUCLE --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



