@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Item Information')}}</h5>
            </div>

            <form class="form-horizontal" action="{{ route('itemadds') }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Item Name')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Item Name')}}" id="name" name="item" class="form-control" required>
                        </div>
                    </div>
                   
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
