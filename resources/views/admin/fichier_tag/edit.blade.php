@extends('admin.layouts.app')

@section('page-heading')
<h2>Fichier Tags</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Fichier Tags</a>
    </li>
    <li>
        <a href="{{ route('admin.fichier-tag.index') }}">Listes</a>
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
                <h5>Mise à jour Fichier Tag : {{$fichierTag->fichier_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.fichier-tag.index')}}/{{$fichierTag->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('fichier_id','text')->model($fichierTag)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('tag_id','text')->model($fichierTag)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection