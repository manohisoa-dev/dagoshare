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
        <strong>Ajout</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un nouveau Personnel</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.personnel.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    <div class="form-group">
                        <label for="fonction_id">Fonction</label>
                        <select class="form-control chosen-select" id="fonction_id" name="fonction_id" required>
                            @foreach(\App\Fonction::all() as $item)
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                                            
                    {!! \Nvd\Crud\Form::input('date_embauche','date')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection