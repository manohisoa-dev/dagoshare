@extends('admin.layouts.app')

@section('page-heading')
<h2>Type de bugs</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Type de bugs</a>
    </li>
    <li>
        <a href="{{ route('admin.bug-type.index') }}">Listes</a>
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
                <h5>Détail type de bug : {{$bugType->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$bugType->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$bugType->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$bugType->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$bugType->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection