@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Fichier Telechargements</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.fichier-telechargement.index') }}">Fichier Telechargements</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.fichier-telechargement.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Fichier Telechargement        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Fichier Telechargements</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.fichier-telechargement.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('fichier_id','admin.fichier-telechargement.index','Fichier Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('user_id','admin.fichier-telechargement.index','Utilisateur')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('ip','admin.fichier-telechargement.index','Ip')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.fichier-telechargement.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.fichier-telechargement.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="fichier_id" value="{{Request::input("fichier_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="ip" value="{{Request::input("ip")}}"></td>
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
                                          data-type="number"
                                          data-name="fichier_id"
                                          data-value="{{ $record->fichier_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-telechargement.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->fichier_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="user_id"
                                          data-value="{{ $record->user_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-telechargement.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->user_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="ip"
                                          data-value="{{ $record->ip }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fichier-telechargement.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->ip }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.fichier-telechargement.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 7])
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