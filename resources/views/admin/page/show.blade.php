@extends('admin.layouts.app')

@section('page-heading')
<h2>Pages</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Pages</a>
    </li>
    <li>
        <a href="{{ route('admin.page.index') }}">Listes</a>
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
                <h5>Détail Page : {{$page->titre}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$page->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Titre</h4>
                        <h5>{{$page->titre}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$page->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Route</h4>
                        <h5>{{$page->route}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Slug</h4>
                        <h5>{{$page->slug}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Nouvelle Onglet</h4>
                        <h5>{{$page->nouvelle_onglet}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$page->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mis à jour le</h4>
                        <h5>{{$page->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection