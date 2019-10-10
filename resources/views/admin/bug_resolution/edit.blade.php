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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Bug Resolution : {{$bugResolution->bug_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.bug-resolution.index')}}/{{$bugResolution->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                    <div class="form-group">
                        <label for="bug_id">Bug</label>
                        <select class="form-control chosen-select" id="bug_id" name="bug_id" required>
                            @foreach(\App\Bug::all() as $item)
                                <option value="{{$item->id}}" {{$bugResolution->bug_id == $item->id ? 'selected' : ''}}>{{$item->titre}}</option>
                            @endforeach
                        </select>
                    </div>

                    {!! \Nvd\Crud\Form::textarea( 'conclusion' )->model($bugResolution)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection