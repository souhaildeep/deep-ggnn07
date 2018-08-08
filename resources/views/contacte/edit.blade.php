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
                                <h3 class="card-title">contact page infos :</h3>
                                <ul class="nav nav-pills m-t-30 justify-content-end m-b-30">
                                       @foreach($listlg as $langue)
                                    <li class=" nav-item"> <a href="#titre{{$langue->flag}}" class="nav-link" data-toggle="tab" aria-expanded="false">{{$langue->name}}</a> </li>
                                     @endforeach                                    
                                </ul>
                                <form class="form-horizontal m-t-40" enctype="multipart/form-data"  method="post" >
                                     <input type="hidden" name="_method" value="PUT">
                                     @csrf
                                <div class="tab-content br-n pn">
                                    <div id="titrefr" class="tab-pane active ">
                                        <div class="row">
                                         
                                          <div class="form-group col-12">
                                            <label>Titre </label>
                                            <input type="text" class="form-control" name="fr_titre" value="{{$ca->titre['fr']}}">
                                            
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titreus" class="tab-pane">
                                        <div class="row">
                                            
                                            <div class="form-group col-12">
                                            <label>Titre </label>
                                            <input type="text" class="form-control" name="en_titre" value="{{$ca->titre['en']}}" >

                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrees" class="tab-pane">
                                        <div class="row">
                                            
                                            <div class="form-group col-12">
                                            <label>Titre</label>
                                           
                                            <input type="text" class="form-control" value="{{$ca->titre['es']}}"  name="es_titre">
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrede" class="tab-pane">
                                        <div class="row">
                                          
                                            <div class="form-group col-12">
                                            <label>titre</label>
                                            
                                            <input type="text" class="form-control" value="{{$ca->titre['de']}}"  name="de_titre">
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrept" class="tab-pane">
                                        <div class="row">
                                           
                                            <div class="form-group col-12">
                                            <label>titre</label>
                                            <input type="text" class="form-control" value="{{$ca->titre['pt']}}"  name="pt_titre">
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titreit" class="tab-pane">
                                        <div class="row">
                                          
                                            <div class="form-group col-12">
                                            <label>titre</label>
                                            
                                            <input type="text" class="form-control" value="{{$ca->titre['it']}}"  name="it_titre">
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titrenl" class="tab-pane">
                                        <div class="row">                            
                                            <div class="form-group col-12">
                                            <label>Titre</label>
                                            <input type="text" class="form-control" value="{{$ca->titre['ne']}}"  name="ne_titre">
                                          </div>
                                        </div>
                                    </div>
                                    <div id="titreru" class="tab-pane">
                                        <div class="row">
                                         
                                            <div class="form-group col-12">
                                            <label>Titre</label>
                                            
                                            <input type="text" class="form-control" value="{{$ca->titre['ru']}}"  name="ru_titre">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" value="{{$ca->email}}" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telephone</label>
                                                    <input type="text" value="{{$ca->tele}}" name="tele" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Adress</label>
                                                    <textarea name="adress" class="form-control"  rows="4">{{$ca->adress}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Google Map</label>
                                                    <textarea name="map" class="form-control"  rows="4">{{$ca->map}}</textarea>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Afficher</button>
                                                      <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                     <div class="modal-content">
                                                        {!! $ca->map !!}
                                                      </div>
                                                    </div>
                                                    </div>
                                                    <div>
                                                     
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                  </div>
                                <h3> <b>Les Réseau social :</b> </h3>
                                <hr>
                                   <div class="row">

                                            <div class="col-6 ">
                                                <div class="input-group">
                                                    <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/facebook.png" width="100%"></span></div>
                                                 <input type="text"  name="fb_socialnet" class="form-control" value="{{$ca->socialnet['fb']}}"  placeholder="Facebook url">
                                                 
                                               </div>
                                            </div>
                                            <div class="col-6 ">
                                                <div class="input-group">
                                                
                                                 <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/twitter.png" width="100%"></span></div>
                                                  <input type="text" value="{{$ca->socialnet['tt']}}"  name="tt_socialnet" class="form-control"  placeholder="Twitter url">
                                               </div>
                                            </div>
                                        </div>
                                            <br>
                                        <div class="row">
                                             <div class="col-6 ">
                                                <div class="input-group">
                                                    <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/instagram.png" width="100%"></span></div>
                                                 <input type="text" value="{{$ca->socialnet['ig']}}"  name="ig_socialnet" class="form-control"  placeholder="Instagram url">
                                                 
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group">
                                                 
                                                 <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/youtube.png" width="100%"></span></div>
                                                 <input type="text" value="{{$ca->socialnet['yt']}}"  name="yt_socialnet" class="form-control" placeholder="Youtube Url">
                                               </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            
                                             <div class="col-6">
                                                <div class="input-group">
                                                    <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/google-plus.png" width="100%"></span></div>
                                                 <input type="text" value="{{$ca->socialnet['gp']}}"  name="gp_socialnet" class="form-control"  placeholder="Google+ url">
                                                 
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group">
                                                 
                                                 <div class="input-group-append"><span class="input-group-text" style="padding: 0"><img src="http://localhost/excursions/public/images/pinterest.png" width="100%"></span></div>
                                                 <input type="text" value="{{$ca->socialnet['pt']}}" name="pt_socialnet"  class="form-control" placeholder="pinterest URl">
                                               </div>
                                            </div>
                                            
                                        </div>

                                 </div>

                                 

                                 </div>
                                <div class="row">
                                    <div class="button-group col-12  text-right "><br>
                                    
                                     <button class="btn btn-lg btn-outline-success"  type="submit">Modifier</button>
                                     <button class="btn btn-lg btn-outline-danger">Annuler</button>
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
     <script src="{{ asset('node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>

  
@endsection