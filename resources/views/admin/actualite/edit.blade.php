@extends('admin.layouts.app')

@section('page-heading')
<h2>Actualites</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Actualites</a>
    </li>
    <li>
        <a href="{{ route('admin.actualite.index') }}">Listes</a>
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
                <h5>Mise à jour Actualite : {{$actualite->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.actualite.index')}}/{{$actualite->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($actualite)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'description' )->model($actualite)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::select( 'nouveau', [ 'oui', 'non' ] )->model($actualite)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection