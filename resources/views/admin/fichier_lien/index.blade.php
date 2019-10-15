@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Fichier Liens</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.fichier-lien.index') }}">Fichier Liens</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.fichier-lien.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Fichier Lien        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Fichier Liens</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.fichier-lien.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('titre','admin.fichier-lien.index','Titre')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('fichier_id','admin.fichier-lien.index','Fichier Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('qualite_id','admin.fichier-lien.index','Qualite Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('lien','admin.fichier-lien.index','Lien')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('hebergeur_id','admin.fichier-lien.index','Hebergeur Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('langue_id','admin.fichier-lien.index','Langue Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('extension','admin.fichier-lien.index','Extension')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('taille','admin.fichier-lien.index','Taille')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.fichier-lien.index','Created At')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.fichier-lien.index','Updated At')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="titre" value="{{Request::input("titre")}}"></td>
                                                            <td><input type="text" class="form-control" name="fichier_id" value="{{Request::input("fichier_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="qualite_id" value="{{Request::input("qualite_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="lien" value="{{Request::input("lien")}}"></td>
                                                            <td><input type="text" class="form-control" name="hebergeur_id" value="{{Request::input("hebergeur_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="langue_id" value="{{Request::input("langue_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="extension" value="{{Request::input("extension")}}"></td>
                                                            <td><input type="text" class="form-control" name="taille" value="{{Request::input("taille")}}"></td>
                                                            <td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
                                                            <td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
                                                        <td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
                        </form>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse ( $records as $record )
                            <tr>
                                                                <td>
                                                                            {{ $record->id }}
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="titre"
                                          data-value="{{ $record->titre }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->titre }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="fichier_id"
                                          data-value="{{ $record->fichier_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->fichier_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="qualite_id"
                                          data-value="{{ $record->qualite_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->qualite_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="lien"
                                          data-value="{{ $record->lien }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->lien }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="hebergeur_id"
                                          data-value="{{ $record->hebergeur_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->hebergeur_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="langue_id"
                                          data-value="{{ $record->langue_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->langue_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="extension"
                                          data-value="{{ $record->extension }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->extension }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="taille"
                                          data-value="{{ $record->taille }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-lien.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->taille }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.fichier-lien.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12])
                        @endforelse
                    </tbody>

                </table>

                @include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

				<script>
					$(".editable").editable({ajaxOptions:{method:'PUT'}});
				</script>
			</div>
		</div>
	</div>
</div>
@endsection