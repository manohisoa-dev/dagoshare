@extends('admin.layouts.app')

@section('page-heading')
<h2>Type de fichiers</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Type de fichiers</a>
    </li>
    <li>
        <a href="{{ route('admin.fichier-type.index') }}">Listes</a>
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
                <h5>Mise à jour type de fichier : {{$fichierType->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.fichier-type.index')}}/{{$fichierType->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($fichierType)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('class','text')->model($fichierType)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection