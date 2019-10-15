@extends('admin.layouts.app')

@section('css')
    <link href="{{ asset('admin/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet"/>
@endsection

@section('page-heading')
    <h2>Fichiers</h2>
    <ol class="breadcrumb">
        <li>
            <a href="#">Fichiers</a>
        </li>
        <li>
            <a href="{{ route('admin.fichier.index') }}">Listes</a>
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
                    <h5>Basic form <small>Simple login form example</small></h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-validation form-padding" action="{{ route('admin.fichier.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab" aria-expanded="true">Déscription</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab" aria-expanded="false">Lien</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        {{--    DESCRIPTION    --}}
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="feed-activity-list">
                                                <div class="col-sm-6 b-r">
                                                    {!! \Nvd\Crud\Form::input('titre','text')->show() !!}

                                                    {!! \Nvd\Crud\Form::input('titre_original','text')->show() !!}

                                                    {!! \Nvd\Crud\Form::textarea( 'description' )->show() !!}

                                                    <div class="form-group">
                                                        <label for="category_id">Catégorie</label>
                                                        <select class="form-control{{ $errors->has('categorie_id') ? ' is-invalid' : '' }} chosen-select" id="category_id" name="category_id" required>
                                                            @foreach(\App\Category::all() as $item)
                                                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('categorie_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('categorie_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sous_categorie_id">Sous-catégorie</label>
                                                        <select class="form-control{{ $errors->has('sous_categorie_id') ? ' is-invalid' : '' }} chosen-select" id="sous_categorie_id" name="sous_categorie_id">
                                                            <option value="">Aucun</option>
                                                            @foreach(\App\SousCategory::all() as $item)
                                                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('sous_categorie_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('sous_categorie_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fichier_type_id">Type du fichier</label>
                                                        <select class="form-control{{ $errors->has('fichier_type_id') ? ' is-invalid' : '' }} chosen-select" id="fichier_type_id" name="fichier_type_id" required>
                                                            @foreach(\App\FichierType::all() as $item)
                                                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('fichier_type_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('fichier_type_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    {!! \Nvd\Crud\Form::input('mot_de_passe','text')->show() !!}
                                                </div>
                                                <div class="col-sm-6">

                                                    {!! \Nvd\Crud\Form::input('realisation','text')->show() !!}

                                                    <div class="form-group">
                                                        <label for="duree">Durée (hh:mm)</label>
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                            <input type="text" name="duree" class="form-control{{ $errors->has('duree') ? ' is-invalid' : '' }}" value="{{ old('duree') }}" placeholder="01:15">
                                                            <span class="input-group-addon">
                                                                            <span class="fa fa-clock-o"></span>
                                                                        </span>
                                                        </div>

                                                        @if ($errors->has('duree'))
                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('duree') }}</strong>
                                                                        </span>
                                                        @endif
                                                    </div>

                                                    {!! \Nvd\Crud\Form::input('annee','text')->show() !!}

                                                    <div class="form-group">
                                                        <label for="tag_id">Tag</label>
                                                        <select class="form-control{{ $errors->has('tag_id') ? ' is-invalid' : '' }} chosen-select" id="tag_id" name="tag_id[]" multiple required>
                                                            <option value="">Aucun</option>
                                                            @foreach(\App\Tag::all() as $item)
                                                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('tag_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('tag_id') }}</strong>
                                                                        </span>
                                                        @endif
                                                    </div>

                                                    {!! \Nvd\Crud\Form::input('taille','text')->show() !!}

                                                    <div class="form-group">
                                                        <label for="taille_unite">Unité</label>
                                                        <select class="form-control{{ $errors->has('taille_unite') ? ' is-invalid' : '' }} chosen-select" id="taille_unite" name="taille_unite" required>
                                                            <option value="oct">oct</option>
                                                            <option value="ko">ko</option>
                                                            <option value="mo">mo</option>
                                                            <option value="go">go</option>
                                                            <option value="to">to</option>
                                                        </select>

                                                        @if ($errors->has('taille_unite'))
                                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('taille_unite') }}</strong>
                                                                    </span>
                                                        @endif
                                                    </div>

                                                    <label for="taille_unite">Photo de couverture du fichier</label>
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileinput-new">Selectionner</span>
                                                        <span class="fileinput-exists">Modifier</span>
                                                        <input type="file" name="..."/>
                                                    </span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{--    LIEN    --}}
                                        <div class="tab-pane" id="tab-2">

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p class="font-bold">Titre (Optionnel)</p>
                                                    <input type="text" placeholder="Saisir le titre du lien" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="font-bold">Qualité</p>
                                                    <select class="form-control{{ $errors->has('qualite_id') ? ' is-invalid' : '' }}" id="qualite_id" name="qualite_id">
                                                        @foreach(\App\Qualite::all() as $item)
                                                            <option value="{{$item->id}}">{{$item->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="font-bold">Url</p>
                                                    <input type="text" placeholder="Saisir l'url" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="font-bold">Hebergeur</p>
                                                    <select class="form-control{{ $errors->has('hebergeur_id') ? ' is-invalid' : '' }}" id="hebergeur_id" name="hebergeur_id">
                                                        @foreach(\App\Hebergeur::all() as $item)
                                                            <option value="{{$item->id}}">{{$item->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <p class="font-bold">Langue</p>
                                                    <select class="form-control{{ $errors->has('langue_id') ? ' is-invalid' : '' }}" id="langue_id" name="langue_id">
                                                        @foreach(\App\Langue::all() as $item)
                                                            <option value="{{$item->id}}">{{$item->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="font-bold">Extension</p>
                                                    <select class="form-control{{ $errors->has('extension_id') ? ' is-invalid' : '' }}" id="extension_id" name="extension_id">
                                                        @foreach(\App\Extension::all() as $item)
                                                            <option value="{{$item->id}}">.{{$item->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <p class="text-white">.</p>
                                                    <button type="button" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-outline" type="submit">
                                        <i class="fa fa-save"></i>
                                        <strong>Enregistrer</strong>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('admin/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/clockpicker/clockpicker.js') }}"></script>
@endsection