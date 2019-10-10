@extends('admin.layouts.app')

@section('page-heading')
<h2>Commentaires</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Commentaires</a>
    </li>
    <li>
        <a href="{{ route('admin.commentaire.index') }}">Listes</a>
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
                <h5>Mise à jour Commentaire : {{$commentaire->fichier_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.commentaire.index')}}/{{$commentaire->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('fichier_id','text')->model($commentaire)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('user_id','text')->model($commentaire)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'message' )->model($commentaire)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('note','text')->model($commentaire)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('point_globale','text')->model($commentaire)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection