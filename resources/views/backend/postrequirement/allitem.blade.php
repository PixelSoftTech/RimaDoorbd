@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Requirement Request')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('itemadd') }}" class="btn btn-circle btn-info">
				<span>{{translate('Add New Item')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Requirement')}}</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg" width="10%">#</th>
                    <th>{{translate('Item Name')}}</th>
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requirement as $key => $staff)
                 
                        <tr>
                            <td>{{ ($key+1)}}</td>
                            <td>{{$staff->item}}</td>
                            <td class="text-right">
		                            <!--<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="#" title="{{ translate('Edit') }}">-->
		                            <!--    <i class="las la-edit"></i>-->
		                            <!--</a>-->
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('itemdelete', $staff->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
                        </tr>
                  
                @endforeach
            </tbody>
        </table>
       
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
