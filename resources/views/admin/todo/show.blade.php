@extends('admin.layouts.app')

@section('page-heading')
<h2>Todos</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Todos</a>
    </li>
    <li>
        <a href="{{ route('admin.todo.index') }}">Listes</a>
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
                <h5>Détail Todo : {{$todo->priorite_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$todo->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Priorite Id</h4>
                        <h5>{{$todo->priorite_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$todo->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{{$todo->description}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Statut</h4>
                        <h5>{{$todo->statut}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Fait Le</h4>
                        <h5>{{$todo->fait_le}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Created At</h4>
                        <h5>{{$todo->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Updated At</h4>
                        <h5>{{$todo->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection