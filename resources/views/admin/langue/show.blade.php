@extends('admin.layouts.app')

@section('page-heading')
<h2>Langues</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Langues</a>
    </li>
    <li>
        <a href="{{ route('admin.langue.index') }}">Listes</a>
    </li>
    <li class="active">
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Langue : {{$langue->code}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$langue->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Code</h4>
                        <h5>{{$langue->code}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$langue->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Prefixe</h4>
                        <h5>{{$langue->prefixe}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$langue->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$langue->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection