@extends('admin.layouts.app')

@section('page-heading')
<h2>Qualites</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Qualites</a>
    </li>
    <li>
        <a href="{{ route('admin.qualite.index') }}">Listes</a>
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
                <h5>Mise à jour Qualite : {{$qualite->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.qualite.index')}}/{{$qualite->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($qualite)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection