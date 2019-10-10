@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Commentaires</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.commentaire.index') }}">Commentaires</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.commentaire.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Commentaire        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Commentaires</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.commentaire.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('fichier_id','admin.commentaire.index','Fichier Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('user_id','admin.commentaire.index','Utilisateur')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('message','admin.commentaire.index','Message')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('note','admin.commentaire.index','Note')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('point_globale','admin.commentaire.index','Point Globale')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.commentaire.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.commentaire.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="fichier_id" value="{{Request::input("fichier_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="message" value="{{Request::input("message")}}"></td>
                                                            <td><input type="text" class="form-control" name="note" value="{{Request::input("note")}}"></td>
                                                            <td><input type="text" class="form-control" name="point_globale" value="{{Request::input("point_globale")}}"></td>
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
                                          data-url="{{ route('admin.commentaire.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->fichier_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="user_id"
                                          data-value="{{ $record->user_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->user_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="message"
                                          data-value="{{ $record->message }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->message }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="text"
                                          data-name="note"
                                          data-value="{{ $record->note }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->note }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="point_globale"
                                          data-value="{{ $record->point_globale }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->point_globale }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.commentaire.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 9])
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