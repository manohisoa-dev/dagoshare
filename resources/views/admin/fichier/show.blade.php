@extends('admin.layouts.app')

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
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <a href="#" class="btn btn-white btn-xs pull-right">Modifier</a>
                                <h2>{{$fichier->titre}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <dl class="dl-horizontal">
                                <dt>Ajouter par:</dt> <dd>{{$fichier->ajouterPar ? $fichier->ajouterPar->nom . ' ' . $fichier->ajouterPar->prenom : '-'}}</dd>
                                <dt>Commentaires:</dt> <dd>  {{$fichier->commentaires->count()}}</dd>
                                <dt>Réalisation:</dt> <dd><a href="#" class="text-navy"> {{ucfirst($fichier->realisation)}}</a> </dd>
                                <dt>Note:</dt> <dd> 	4.5 </dd>
                            </dl>
                        </div>
                        <div class="col-lg-7" id="cluster_info">
                            <dl class="dl-horizontal">

                                <dt>Dernière modification:</dt> <dd>{{$fichier->updated_at}}</dd>
                                <dt>Ajouter le:</dt> <dd> 	{{$fichier->created_at}} </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row m-t-sm">
                        <div class="col-lg-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab" aria-expanded="true">Commentaires</a></li>
{{--                                            <li class=""><a href="#tab-2" data-toggle="tab" aria-expanded="false">Last activity</a></li>--}}
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="feed-activity-list">
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="img/a2.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                        <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                            Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="img/a3.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                        <small class="text-muted">2 days ago at 8:30am</small>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="img/a4.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right text-navy">5h ago</small>
                                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                        <div class="actions">
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
{{--                                        <div class="tab-pane" id="tab-2">--}}

{{--                                            <table class="table table-striped">--}}
{{--                                                <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th>Status</th>--}}
{{--                                                    <th>Title</th>--}}
{{--                                                    <th>Start Time</th>--}}
{{--                                                    <th>End Time</th>--}}
{{--                                                    <th>Comments</th>--}}
{{--                                                </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        Create project in webapp--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        12.07.2014 10:10:1--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        14.07.2014 10:16:36--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <p class="small">--}}
{{--                                                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.--}}
{{--                                                        </p>--}}
{{--                                                    </td>--}}

{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        Various versions--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        12.07.2014 10:10:1--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        14.07.2014 10:16:36--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <p class="small">--}}
{{--                                                            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).--}}
{{--                                                        </p>--}}
{{--                                                    </td>--}}

{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        There are many variations--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        12.07.2014 10:10:1--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        14.07.2014 10:16:36--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <p class="small">--}}
{{--                                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which--}}
{{--                                                        </p>--}}
{{--                                                    </td>--}}

{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        Latin words--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        12.07.2014 10:10:1--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        14.07.2014 10:16:36--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <p class="small">--}}
{{--                                                            Latin words, combined with a handful of model sentence structures--}}
{{--                                                        </p>--}}
{{--                                                    </td>--}}

{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}

{{--                                        </div>--}}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="wrapper wrapper-content project-manager">
            <h4>Déscription</h4>
            <img src="{{asset('admin/img/zender_logo.png')}}" class="img-responsive">
            <p class="small">
                {{$fichier->description}}
            </p>
            <h5>Tags</h5>
            <ul class="tag-list" style="padding: 0">
                @foreach($fichier->tags as $item)
                    <li><a href=""><i class="fa fa-tag"></i> {{$item->tag->libelle}}</a></li>
                @endforeach
            </ul>
            <br>
            <div class="text-center m-t-lg">
                <a href="#" class="btn btn-primary btn-block m-t"><i class="fa fa-cloud-download"></i> Télécharger le fichier</a>
            </div>
        </div>
    </div>
</div>

@endsection