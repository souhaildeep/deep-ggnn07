
@extends('layouts.app')

@section('style')
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Eureka admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
                <!-- Validation wizard -->

                     <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <h4 class="card-title">Facture</h4>
                                
                                <form enctype="multipart/form-data" name="form" id="form" method="POST" class="validation-wizard wizard-circle">
                                     @csrf

                                    <!-- Step 1 => take title-->
                                    <h6>Étape 1</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">    
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Logo <span class="danger">*</span> </label>
                                                    <input type="file" class="form-control required" id="wfirstName2" name="logo">
                                                </div>
                                                
                                            </div>
                                             <div class="col-md-6">    
                                                 <div class="form-group">
                                                <label class="control-label">Pourcentage %</label>
                                                <input id="pourcentage" type="text"   name="pourcentage" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                                
                                            </div>
                                            
                                        </div>

                                    </section>
                                    <!-- Step 2 => take disc -->
                                    <h6>Étape 2</h6>
                                    <section>
                                        <div class="row">
                                            @foreach($listlg as $langue)
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Description({{$langue->name}}) :</label>
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <textarea  class="summernote" name="{{$langue->flag}}_description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach                                    
                                        </div>
                                    </section>
                                    <!-- Step 3 => take infos -->
                                    <h6>Étape 3</h6>
                                    <section>
                                        <div class="row">
                                             @foreach($listlg as $langue)
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Footer ({{$langue->name}}) :</label>
                                                    <div class="card">
                                                     <textarea  class="summernote" name="{{$langue->flag}}_footer"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach 
                                            
                                        </div>
                                    </section>
                                    <!-- Step 4 => take ( city , price , images )-->
                                    
                                    
                                </form>

                            </div>
                        </div>
                    </div><br>
                     
                   

                    </div>
                 
                     
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

            <!-- ============================================================== -->

@endsection
@section('js')
     <!--stickey kit -->
    <script src="{{ asset('node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>

    <script src="{{ asset('node_modules/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('node_modules/wizard/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('node_modules/wizard/jquery.validate.min.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('node_modules/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('node_modules/wizard/steps.js')}}"></script>
     <script src="{{ asset('node_modules/summernote/dist/summernote.min.js')}}"></script>

         <script>
    jQuery(document).ready(function() {
        $('.summernote').summernote({
            height: 210, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        $("input[name='pourcentage']").TouchSpin({
            min: 0,
            max: 100,
            step: 1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
    });


    </script>



@endsection