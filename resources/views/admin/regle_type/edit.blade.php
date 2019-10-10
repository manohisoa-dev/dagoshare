@extends('admin.layouts.app')

@section('page-heading')
<h2>Regle Types</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Regle Types</a>
    </li>
    <li>
        <a href="{{ route('admin.regle-type.index') }}">Listes</a>
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
                <h5>Mise à jour Regle Type : {{$regleType->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.regle-type.index')}}/{{$regleType->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($regleType)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection