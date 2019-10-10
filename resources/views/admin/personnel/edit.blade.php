@extends('admin.layouts.app')

@section('page-heading')
<h2>Personnels</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Personnels</a>
    </li>
    <li>
        <a href="{{ route('admin.personnel.index') }}">Listes</a>
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
                <h5>Mise à jour Personnel : {{$personnel->fonction_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.personnel.index')}}/{{$personnel->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                    <div class="form-group">
                        <label for="fonction_id">Fonction</label>
                        <select class="form-control chosen-select" id="fonction_id" name="fonction_id" required>
                            @foreach(\App\Category::all() as $item)
                                <option value="{{$item->id}}" {{$personnel->fonction_id == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>

                    {!! \Nvd\Crud\Form::input('date_embauche','date')->model($personnel)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection