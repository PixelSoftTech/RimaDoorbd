@extends('backend.layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
    <div class="card card-preview">
        <div class="card-inner">

            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Product_link</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($showdata as $show)
                    <tr>
                        <td>{{$show->id}}</td>
                        <td>{{$show->Name}}</td>
                        <td>{{$show->Phone}}</td>
                        <td>{{$show->Email}}</td>
                        <td><a target="_blank" href="{{$show->Product_link}}">Product Link1</a>||
                            @if($show->Product_link1!=NULL)
                                <a target="_blank" href="{{$show->Product_link1}}">Product Link2</a>
                            @endif
                        </td>
                        <td>{{$show->Size}}</td>
                        <td>{{$show->color}}</td>
                        <td>{{$show->Quantity}}</td>
                        <td>{{$show->Comments}}</td>
                        <td>{{$show->Status}}</td>

                        <td><a href="{{route('delete',$show->id)}}" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{route('edits',$show->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>



@endsection
