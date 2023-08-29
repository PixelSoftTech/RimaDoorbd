@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Requirement Request')}}</h1>
		</div>
		<!--<div class="col-md-6 text-md-right">-->
		<!--	<a href="{{ route('staffs.create') }}" class="btn btn-circle btn-info">-->
		<!--		<span>{{translate('Add New Requirement')}}</span>-->
		<!--	</a>-->
		<!--</div>-->
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
                    <th data-breakpoints="lg" width="5%">#</th>
                   
                     <th data-breakpoints="lg">{{translate('Name')}}</th>
                      <th data-breakpoints="lg">{{translate('Phone')}}</th>
                       <th data-breakpoints="lg">{{translate('Address')}}</th>
                        <th>{{translate('Item Name')}}</th>
                    <th data-breakpoints="lg">{{translate('Description')}}</th>
                    <th data-breakpoints="lg">{{translate('Delivery Location')}}</th>
                    <th data-breakpoints="lg">{{translate('Item Qty')}}</th>
                     <th data-breakpoints="lg">{{translate('Supplier')}}</th>
                      <th data-breakpoints="lg">{{translate('Valid Date')}}</th>
                       <th data-breakpoints="lg">{{translate('Call Time')}}</th>
                        <th data-breakpoints="lg">{{translate('File')}}</th>
                    <th width="5%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requirement as $key => $staff)
                 
                        <tr>
                            <td>{{ ($key+1)}}</td>
                          
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->phone}}</td>
                            <td>{{$staff->address}}</td>
                              <td>{{$staff->item_name}}</td>
                            <td>{{$staff->description}}</td>
                            <td>{{$staff->delivery_location}}</td>
                             <td>{{$staff->item_qty}}</td>
                              <td>{{$staff->suppler}}</td>
                               <td>{{$staff->valid_date}}</td>
                                <td>{{$staff->call_time}}</td>
                                 <td><img style="width:120px; height:80px;" src="{{asset($staff->files)}}"></td>
                            
                            
                            <td class="text-right">
		                            <!--<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="#" title="{{ translate('Edit') }}">-->
		                            <!--    <i class="las la-edit"></i>-->
		                            <!--</a>-->
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('requirementdelete', $staff->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
                        </tr>
                  
                @endforeach
            </tbody>
        </table>
        
        
            
         <div class="aiz-pagination">
  {{ $requirement->appends(request()->input())->links() }}
        </div>
       
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
