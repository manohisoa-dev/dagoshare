@extends('admin.layouts.app')

@section('page-heading')
<h2>Demandes</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Demandes</a>
    </li>
    <li>
        <a href="{{ route('admin.demande.index') }}">Listes</a>
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
                <h5>Mise à jour Demande : {{$demande->user_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.demande.index')}}/{{$demande->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('user_id','text')->model($demande)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('compte_facebook','text')->model($demande)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'description' )->model($demande)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::select( 'statut', [ 'en_attente', 'en_cours', 'fait', 'annuler' ] )->model($demande)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('personnel_id','text')->model($demande)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection