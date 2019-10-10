@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Personnels</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.personnel.index') }}">Personnels</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.personnel.create') }}" type="button" class="btn btn-primary">
            Ajouter un nouveau Personnel
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Personnels</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.personnel.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('fonction_id','admin.personnel.index','Fonction')!!}
                        {!!\Nvd\Crud\Html::sortableTh('date_embauche','admin.personnel.index','Date Embauche')!!}
                        {!!\Nvd\Crud\Html::sortableTh('created_at','admin.personnel.index','Créer le')!!}
                        {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.personnel.index','Mis à jour le')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td>
                                <select class="form-control chosen-select" id="fonction_id" name="fonction_id">
                                    <option value="">Toutes les fonctions</option>
                                    @foreach(\App\Fonction::all() as $item)
                                        <option value="{{$item->id}}" {{Request::input("fonction_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="date" class="form-control" name="date_embauche" value="{{Request::input("date_embauche")}}"></td>
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
                                      data-name="fonction_id"
                                      data-value="{{ $record->fonction_id }}"
                                      data-pk="{{ $record->{$record->getKeyName()} }}"
                                      data-url="{{ route('admin.personnel.index')}}/{{ $record->{$record->getKeyName()} }}"
                                      >{{ $record->fonction ? $record->fonction->libelle : '' }}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                      data-type="date"
                                      data-name="date_embauche"
                                      data-value="{{ $record->date_embauche }}"
                                      data-pk="{{ $record->{$record->getKeyName()} }}"
                                      data-url="{{ route('admin.personnel.index')}}/{{ $record->{$record->getKeyName()} }}"
                                      >{{ $record->date_embauche }}</span>
                                </td>
                                <td>
                                    {{ $record->created_at }}
                                </td>
                                <td>
                                    {{ $record->updated_at }}
                                </td>
                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.personnel.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 6])
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