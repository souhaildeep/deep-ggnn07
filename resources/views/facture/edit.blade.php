@extends('layouts.app')
@section('style')
 <link href="{{ asset('css/pages/tab-page.css')}}" rel="stylesheet">

 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
     <link href="{{ asset('node_modules/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
   <link href="{{ asset('css/pages/user-card.css')}}" rel="stylesheet">
   
 
@endsection

@section('content')
		<div class="row" id="app">
                    <div class="col-sm-12">
                        <div class="card card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste d'excursions</h4>
                                <ul class="nav nav-pills m-t-30 justify-content-end m-b-30">
                                       @foreach($listlg as $langue)
                                    <li class=" nav-item"> <a href="#titre{{$langue->flag}}" class="nav-link" data-toggle="tab" aria-expanded="false">{{$langue->flag}}</a> </li>
                                     @endforeach
                                    
                                </ul>
                                <form class="form-horizontal m-t-40" enctype="multipart/form-data"  method="post" >
                                     <input type="hidden" name="_method" value="PUT">
                                     @csrf
                                <div class="tab-content br-n pn">
                                    <div id="titrefr" class="tab-pane active ">
                                        <div class="row">
                                         
                                          <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote" name="fr_description">{{$fa->description['fr']}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="fr_footer">{{$fa->footer['fr']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titreus" class="tab-pane">
                                        <div class="row">
                                            
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote" name="en_description">{{$fa->description['en']}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="en_footer">{{$fa->footer['en']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrees" class="tab-pane">
                                        <div class="row">
                                            
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote"  name="es_description">{{$fa->description['es']}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="es_footer">{{$fa->footer['es']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrede" class="tab-pane">
                                        <div class="row">
                                          
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote"   name="de_description">{{$fa->description['de']}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="de_footer">{{$fa->footer['de']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrept" class="tab-pane">
                                        <div class="row">
                                           
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote" name="pt_description">{{$fa->description['pt']}}</textarea>
                                          </div>
                                            <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="pt_footer">{{$fa->footer['pt']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titreit" class="tab-pane">
                                        <div class="row">
                                          
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote"  name="it_description">{{$fa->description['it']}}</textarea>
                                          </div>
                                            <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="it_footer">{{$fa->footer['it']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrenl" class="tab-pane">
                                        <div class="row">
                                            
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote"  name="ne_description">{{$fa->description['ne']}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="ne_footer">{{$fa->footer['ne']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titreru" class="tab-pane">
                                        <div class="row">
                                         
                                            <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea class="summernote"  name="ru_description">{{$fa->description['ru']}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>footer </label>
                                            <textarea class="summernote" name="ru_footer">{{$fa->footer['ru']}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div  class="row  el-element-overlay">
                                    <div class="card col-md-6">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img v-if="!avatar" src="{{asset('storage/'.$fa->logo)}}" alt="logo" />
                                    <img v-else :src="avatar" alt="logo" />

                                </div>
                                <div class="el-card-content" >
                                    <label for="logo" class="text-center" style="cursor: pointer" ><i class="fa fa-camera"></i> Click ici pour Modifier la photo </label>
                                     <input name ="logo" id="logo" type="file" style=" display: none;" @change="GetImage"> 
                                </div>
                            </div>
                                 </div> 
                                <div class="col-md-6">    
                                                 <div class="form-group">
                                                <label class="control-label">Pourcentage %</label>
                                                <input id="pourcentage" type="text" value="{{$fa->pourcentage}}"  name="pourcentage" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                                
                                            </div>
                                 </div>
                                 
                                <div class="row">
                                    <div class="button-group col-12  text-right "><br>
                                     <input type="submit" name="Send">
                                     <button class="btn btn-lg btn-outline-success">Annuler</button>
                                    </div>                             
                                 </div>
                            </div>
                        </div>

                                
							
                            </form>
                        </div>
                    </div>
                </div>
         

@endsection
@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="{{ asset('node_modules/summernote/dist/summernote.min.js')}}"></script>
     <script src="{{ asset('node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>

         <script>
    jQuery(document).ready(function() {
        $('.summernote').summernote({
            height: 200, // set editor height
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
     <script>
    window.laravel = {!! json_encode([
        'csrfToken'   => csrf_token(),
        'url'         => url('/'),
        ]) !!};
</script>
    <script >
        var app = new Vue({
  el: '#app',
  data: {
     avatar :null,
     file : null,
  },
  methods : {
    GetImage(e){
            this.file = e.target.files[0]            
            let image = e.target.files[0];
            this.createImg(image);
          },
          
          createImg(image){ 
            let reader = new FileReader;
            reader.readAsDataURL(image);
            reader.onload = (e) =>{
                  this.avatar = e.target.result;

            };
           },

  }
})
    </script>
@endsection