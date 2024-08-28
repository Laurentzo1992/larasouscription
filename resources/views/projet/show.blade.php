@extends('base')

@section('title', 'Portail | DGI')
@section('content')

<H2 class="text-center mt-4">Listes des projets</H2>

<div class="container-fluid">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom du projet</th>
            <th scope="col">Montant</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projets as $projet)
          <tr>
            <th>{{ $projet->id }}</th>
            <td>{{ $projet->libelle }}</td>
            <td>{{ $projet->amount }}</td>
            <td>
                <a href="">

                </a>
                <i class="fa fa-pen"></i>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection
