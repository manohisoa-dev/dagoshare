@extends('admin.layouts.app')

@section('page-heading')
<h2>Regle Generales</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Regle Generales</a>
    </li>
    <li>
        <a href="{{ route('admin.regle-generale.index') }}">Listes</a>
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
                <h5>Détail Regle Generale : {{$regleGenerale->regle_type_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$regleGenerale->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Regle Type Id</h4>
                        <h5>{{$regleGenerale->regle_type_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$regleGenerale->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$regleGenerale->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$regleGenerale->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection