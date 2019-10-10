@extends('admin.layouts.app')

@section('page-heading')
<h2>Personnels</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Personnels</a>
    </li>
    <li>
        <a href="{{ route('admin.personnel.index') }}">Listes</a>
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
                <h5>Détail Personnel : {{$personnel->fonction_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$personnel->id}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Fonction</h4>
                        <h5>{{ $personnel->fonction ? $personnel->fonction->libelle : ''}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Date Embauche</h4>
                        <h5>{{$personnel->date_embauche}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$personnel->created_at}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$personnel->updated_at}}</h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection