@extends('frontend.layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!--Boostrap 5 cdn CSS links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Jquery Date Picker links-->
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="/resources/demos/style.css">
     
  
   
@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('calculator')}}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">
                            {{ translate('Home')}}
                        </a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('calculator') }}">
                            "{{ translate('calculator') }}"
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="section">
    <div class="container mt-2 py-5">


        <div class="form-horizontal">
            <div class="form-group">
                <div class="small">
                    <h3 class="text-center">Construction Cost Calculator </h3>
                    <br>
                    <h6 class="text-center subtext">Cost Calculator helps you get a realistic estimate of your actual costs in constructing your home. </h6>

                </div>
            </div>
        </div>
        <div class="row justify-content-md-center mt-5 mb-5" >

        
                  <div class="col-md-6 py-5 px-3" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                <form>
                  
                    <div class="mb-3">
                         <label class="form-label">Width [sqft]</label>
                        <input class="form-control" id="width" rows="3" name="description" required/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Length [sqft]</label>
                        <input class="form-control" id="length" rows="3" name="description" required/>
                    </div>
                    <div class="mb-3">
                       <label class="form-label">Floors</label>
                        <select class="form-control" id="floor">
                            <option value="1">1</option>
                             <option value="2">2</option>
                              <option value="3">3</option>
                               <option value="4">4</option>
                                <option value="5">5</option>
                                 <option value="6">6</option>
                                  
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        
                         <label class="form-label">Area [sqft]</label>
                        <input class="form-control" id="area" rows="3" name="description" readonly/>
                        
                    </div>
                   
                  
                
                    <button style="background-color:#f1dd02;border-color:#f1dd02; color:#1e1f1a !important;" type="button" class="btn btn-primary float-end" onclick="cal()">Calculate</button>
                </form>

            </div>
          
       <div class="col-md-6 d-none" id="showdeatails" >
     
           <div class="row">
               
               <div class="col-md-12">
                   
               </div>
           </div>
          
           
       </div>
       
      
         
        


        </div>
        
        
        

    </div>

</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
 <!--Jquery Date Picker script-->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
   
      $( "#datepicker" ).datepicker(  "showAnim", $( this ).val() );
   
  } );
  
 
  </script>
  
  
  <script>
  document.getElementById("showdeatails").style.visibility = "hidden";

          function cal(){
      var width=$('#width').val();
       var length=$('#length').val();
        var floor=$('#floor').val();
      var area=(width*length)*floor;
      $('#area').val(area);
       document.getElementById("showdeatails").style.visibility = "visible";
      
       
  } 
          
      
  </script>
  <!--File Drop Zone-->

  
<script src="dist/dropzone.js"></script>
