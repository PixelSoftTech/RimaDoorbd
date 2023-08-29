@extends('backend.layouts.app')


@section('content')
    <div class="card card-preview">
        <div class="card-inner">

            <form action="{{route('updatedata',$showdata->id)}}" method="POST">
                @csrf
                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>
                    <div class="col-lg-4 col-xs-12 col-md-4">
                        <label>Name:</label>
                        <input class="bd form-control text-dark" value="{{$showdata->Name}}" type="text" name="Name"
                               placeholder="Enter Your Name">
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-4">
                        <label>Phone:</label>
                        <input class="bd form-control" type="text" name="Phone"
                               value="{{$showdata->Phone}}" placeholder="Enter Your Phone Number">
                    </div>

                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>


                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>
                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <label>Email:</label>
                        <input value="{{$showdata->Email}}" class="bd form-control" type="email" name="Email"
                               placeholder="Enter Your Email">
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>

                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <label> Product Link1:</label>
                        <input class="bd form-control" type="text" name="Product_link"
                               value="{{$showdata->Product_link}}" placeholder="Enter Product Link">
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>


                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>

                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <label> Product Link2:</label>
                        <input class="bd form-control" type="text" name="Product_link1"
                               placeholder="Enter Product Link" value="{{$showdata->Product_link1}}">
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>

                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <label>More Product Link:</label>
                        <textarea class="bd form-control" name="Morelink" id="" cols="30" rows="3"
                                  placeholder="Please enter Mutiple Product link separate by comma">{{$showdata->Morelink}}</textarea>
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>
                    <div class="col-lg-3 col-xs-12 col-md-3">
                        <label for="">Size</label>
                        <input class="bd form-control" type="text" name="Size" placeholder="Enter Size"
                               value="{{$showdata->Size}}" required>
                        <input class="form-control" type="hidden" name="Date" placeholder="Enter Size"
                               value="{{date('Y-m-d')}}">
                        <input class="form-control" type="hidden" name="Status" placeholder="Enter Size"
                               value="Pending">
                    </div>
                    <div class="col-lg-2 col-xs-12 col-md-2">
                        <label for="">Color</label>
                        <input class="bd form-control" type="text" name="color" placeholder="Enter Color"
                               value="{{$showdata->color}}">
                    </div>
                    <div class="col-lg-3 col-xs-12 col-md-3">
                        <label for="">Quantity</label>
                        <input class="bd form-control" type="text" name="Quantity" placeholder="Enter Quantity"
                               value="{{$showdata->Quantity}}">
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>


                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>
                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <label> Comments:</label>
                        <textarea class="form-control" name="Comments" cols="30" rows="3"
                                  placeholder="Enter Your Comments">{{$showdata->Comments}}</textarea>
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>


                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>
                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <label> Status:</label>
                        <select class="form-control" name="Status" id="">
                            <option value="{{$showdata->Status}}">{{$showdata->Status}}</option>
                            <option value="Order Accepted">Order accepted</option>
                            <option value="Payment pending">Payment pending</option>
                            <option value="Order processing">Order processing</option>
                            <option value="Order processing in overseas">Order processing in overseas</option>
                            <option value="Order shipped">Order shipped</option>
                            <option value="Order on the way warehouse">Order on the way to warehouse</option>
                            <option value="Processing for delivery">Processing for delivery </option>
                            <option value="Order pick up for delivery">Order pick up for delivery </option>
                            <option value="Order pick up for delivery">Order pick up for delivery </option>
                            <option value="Order delivered">Order delivered </option>
                            <option value="Cancel">Cancel</option>

                        </select>
                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2"></div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-2 col-xs-12 col-md-2"></div>
                    <div class="col-lg-8 col-xs-12 col-md-8">

                    </div>


                    <div class="col-lg-2 col-sm-12 col-md-2">
                        <input  class="btn btn-primary pull-left" type="submit" name="" id="" value="Update Request">
                    </div>
                </div>







            </form>

        </div>
    </div>



@endsection
