@extends('admin.layouts.app')

@section('page-heading')
<h2>Bugs</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Bugs</a>
    </li>
    <li>
        <a href="{{ route('admin.bug.index') }}">Listes</a>
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
                <h5>Détail Bug : {{$bug->bug_type_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$bug->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>type de bug Id</h4>
                        <h5>{{$bug->bug_type_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Statut</h4>
                        <h5>{{$bug->statut}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Titre</h4>
                        <h5>{{$bug->titre}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Url</h4>
                        <h5>{{$bug->url}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$bug->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$bug->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$bug->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection