<?php
/* @var $gen \Nvd\Crud\Commands\Crud */
/* @var $fields [] */
?>

@extends('<?=config('crud.layout')?>')

@section('page-heading')
<h2><?= $gen->titlePlural() ?></h2>
<ol class="breadcrumb">
    <li>
        <a href="#"><?= $gen->titlePlural() ?></a>
    </li>
    <li>
        <a href="{{ route('<?= $gen->generateRouteAction('index') ?>') }}">Listes</a>
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
                <h5>Mise à jour <?=$gen->titleSingular()?> : {{$<?=$gen->modelVariableName()?>-><?=array_values($fields)[1]->name?>}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('<?=$gen->generateRouteAction('index')?>')}}/{{$<?=$gen->modelVariableName()?>->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                        <?php foreach ( $fields as $field )  { ?>
                        <?php if( $str = \Nvd\Crud\Db::getFormInputMarkup( $field, $gen->modelVariableName() ) ) { ?>

                            <?=$str?>

                        <?php } ?>
                        <?php } ?>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection