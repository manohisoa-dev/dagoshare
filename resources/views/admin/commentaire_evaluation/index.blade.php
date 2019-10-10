@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Commentaire Evaluations</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.commentaire-evaluation.index') }}">Commentaire Evaluations</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.commentaire-evaluation.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Commentaire Evaluation        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Commentaire Evaluations</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.commentaire-evaluation.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('commentaire_id','admin.commentaire-evaluation.index','Commentaire Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('valeur','admin.commentaire-evaluation.index','Valeur')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('attribuer_par','admin.commentaire-evaluation.index','Attribuer Par')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.commentaire-evaluation.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.commentaire-evaluation.index','Mis à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="commentaire_id" value="{{Request::input("commentaire_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="valeur" value="{{Request::input("valeur")}}"></td>
                                                            <td><input type="text" class="form-control" name="attribuer_par" value="{{Request::input("attribuer_par")}}"></td>
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
                                          data-name="commentaire_id"
                                          data-value="{{ $record->commentaire_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire-evaluation.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->commentaire_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="valeur"
                                          data-value="{{ $record->valeur }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire-evaluation.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->valeur }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="attribuer_par"
                                          data-value="{{ $record->attribuer_par }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.commentaire-evaluation.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->attribuer_par }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.commentaire-evaluation.index'), 'record' => $record ] )
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