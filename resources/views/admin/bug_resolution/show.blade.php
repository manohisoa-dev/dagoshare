@extends('admin.layouts.app')

@section('page-heading')
<h2>Bug Resolutions</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Bug Resolutions</a>
    </li>
    <li>
        <a href="{{ route('admin.bug-resolution.index') }}">Listes</a>
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
                <h5>Détail Bug Resolution : {{$bugResolution->bug_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$bugResolution->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Bug</h4>
                        <h5>{{$bugResolution->bug_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Conclusion</h4>
                        <h5>{{$bugResolution->conclusion}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$bugResolution->created_at}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$bugResolution->updated_at}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection