@extends('admin.layouts.app')

@section('page-heading')
<h2>Commentaire Evaluations</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Commentaire Evaluations</a>
    </li>
    <li>
        <a href="{{ route('admin.commentaire-evaluation.index') }}">Listes</a>
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
                <h5>Détail Commentaire Evaluation : {{$commentaireEvaluation->commentaire_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$commentaireEvaluation->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Commentaire Id</h4>
                        <h5>{{$commentaireEvaluation->commentaire_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Valeur</h4>
                        <h5>{{$commentaireEvaluation->valeur}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Attribuer Par</h4>
                        <h5>{{$commentaireEvaluation->attribuer_par}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$commentaireEvaluation->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$commentaireEvaluation->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection