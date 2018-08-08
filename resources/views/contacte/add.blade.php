
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
                                <h4 class="card-title">Page Contact</h4>
                                
                                <form enctype="multipart/form-data" name="form" id="form" method="POST" class="validation-wizard wizard-circle">
                                     @csrf
                                    <!-- Step 1 => take title-->
                                    <h6>Étape 1</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/facebook.png" width="100%"></span></div>
                                                 <input type="text"  name="fb_socialnet" class="form-control"  placeholder="Facebook url">
                                                 
                                               </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-group">
                                                
                                                 <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/twitter.png" width="100%"></span></div>
                                                  <input type="text"  name="tt_socialnet" class="form-control"  placeholder="Twitter url">
                                               </div>
                                            </div>
                                        </div>
                                            <br>
                                        <div class="row">
                                             <div class="col-md-6 col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/instagram.png" width="100%"></span></div>
                                                 <input type="text"  name="ig_socialnet" class="form-control"  placeholder="Instagram url">
                                                 
                                               </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-group">
                                                 
                                                 <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/youtube.png" width="100%"></span></div>
                                                 <input type="text"  name="yt_socialnet" class="form-control" placeholder="Youtube Url">
                                               </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            
                                             <div class="col-md-6 col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/google-plus.png" width="100%"></span></div>
                                                 <input type="text"  name="gp_socialnet" class="form-control"  placeholder="Google+ url">
                                                 
                                               </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-group">
                                                 
                                                 <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/pinterest.png" width="100%"></span></div>
                                                 <input type="text" name="pt_socialnet"  class="form-control" placeholder="pinterest URl">
                                               </div>
                                            </div>
                                            
                                        </div>
                                        <br>
                                       
                                    </section>
                                    
                                    <!-- Step 2 => take disc -->
                                    <h6>Étape 2</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telephone</label>
                                                    <input type="text" name="tele" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Adress</label>
                                                    <textarea name="adress" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Google Map</label>
                                                    <textarea name="map" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </section>
                                    <!-- Step 3 => take infos -->
                                    <h6>Étape 3</h6>
                                    <section>
                                        <div class="row">
                                            @foreach($listlg as $langue)
                                            <div class="col-md-6">
                                                    
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Titre ({{$langue->name}}) : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="wfirstName2" name="{{$langue->flag}}_titre">
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
 <script type="text/javascript">
    $(function() {
        $('a.pl').click(function(e) {
            e.preventDefault();
            $('#phone').append('<div><input type="text" name="multiple3[]" class="form-control" ></div>');
        });
        $('a.mi').click(function (e) {
            e.preventDefault();
            if ($('#phone input').length > 1) {
                $('#phone').children().last().remove();
            }
        });
    });
    </script>
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
  

@endsection
