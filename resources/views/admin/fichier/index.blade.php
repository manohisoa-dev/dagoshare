@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Fichiers</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.fichier.index') }}">Fichiers</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.fichier.create') }}" type="button" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> <span class="nav-label"> &nbsp; Ajouter un fichier</span>
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="file-manager">
                    <h5>Afficher:</h5>
                    <a href="{{route('admin.fichier.index', 'fichier_type_id=' .
                                                            '&category_id=' .
                                                           '&tag_id='
                    )}}" class="file-control {{Request::input("fichier_type_id") =='' ? 'active' : ''}}">Tout</a>
                    @foreach(\App\FichierType::all() as $type)
                        <a href="{{route('admin.fichier.index', 'fichier_type_id=' . $type->id .
                                                            '&category_id=' . Request::input("category_id") .
                                                           '&tag_id='. Request::input("tag_id")
                    )}}" class="file-control {{Request::input("fichier_type_id") == $type->id ? 'active' : ''}}">{{$type->libelle}}</a>
                    @endforeach

                    <div class="hr-line-dashed"></div>
                    <a href="{{ route('admin.fichier.create') }}">
                        <button class="btn btn-primary btn-block">
                            <i class="fa fa-cloud-upload"></i> <span class="nav-label"> &nbsp; Ajouter un fichier</span>
                        </button>
                    </a>
                    <div class="hr-line-dashed"></div>
                    <h5>Catégories</h5>
                    <ul class="folder-list" style="padding: 0">
                        @foreach(\App\Category::all() as $category)
                            <li><a href="{{route('admin.fichier.index', 'fichier_type_id=' . Request::input("fichier_type_id") .
                                                            '&category_id=' . $category->id .
                                                           '&tag_id='. Request::input("tag_id")
                            )}}"><i class="fa fa-folder"></i> {{$category->libelle}}</a></li>
                        @endforeach
                    </ul>
                    <h5 class="tag-title">Tags</h5>
                    <ul class="tag-list" style="padding: 0">
                        @foreach(\App\Tag::all() as $tag)
                            <li><a href="{{route('admin.fichier.index', 'fichier_type_id=' . Request::input("fichier_type_id") .
                                                            '&category_id=' . Request::input("category_id") .
                                                           '&tag_id='. $tag->id
                    )}}">{{$tag->libelle}}</a></li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content border-sbottom">
                        <h2>
                            @if(Request::input("titre"))
                                {{$records->count()}} resultat{{$records->count() > 1 ? 's' : ''}} trouvé{{$records->count() > 1 ? 's' : ''}} pour: <span class="text-navy">“{{Request::input("titre")}}”</span>
                            @else
                                {{$records->count()}} resultat{{$records->count() > 1 ? 's' : ''}} trouvé{{$records->count() > 1 ? 's' : ''}}
                            @endif
                        </h2>
                        <small>Temps d'execution  ({{number_format($time,4)}} seconds)</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach($records as $fichier)
                    <div class="file-box">
                        <div class="file">
                            <a href="{{route('admin.fichier.index')}}/{{$fichier->id}}">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa {{$fichier->fichierType ? $fichier->fichierType->class : 'fa-file'}}"></i>
                                </div>
                                <div class="file-name">
                                    {{str_limit($fichier->titre, 26, '...')}}
                                    <br/>
                                    <small>Ajouter le: Jan 11, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection