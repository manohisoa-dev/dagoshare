@extends('admin.layouts.app')

@section('page-heading')
<h2>Sous Categories</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Sous Categories</a>
    </li>
    <li>
        <a href="{{ route('admin.sous-category.index') }}">Listes</a>
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
                <h5>Détail Sous Category : {{$sousCategory->category_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$sousCategory->id}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Categorie</h4>
                        <h5>{{ $sousCategory->category ? $sousCategory->category->libelle : '' }}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$sousCategory->libelle}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$sousCategory->created_at}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$sousCategory->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection