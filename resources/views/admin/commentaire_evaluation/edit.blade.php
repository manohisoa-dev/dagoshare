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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Commentaire Evaluation : {{$commentaireEvaluation->commentaire_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.commentaire-evaluation.index')}}/{{$commentaireEvaluation->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('commentaire_id','text')->model($commentaireEvaluation)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('valeur','text')->model($commentaireEvaluation)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('attribuer_par','text')->model($commentaireEvaluation)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection