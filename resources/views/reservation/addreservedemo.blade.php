@extends('layouts.app')
@section('content')
   <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Réserver (Demo)</h4>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data"   method="POST" action="{{url('reservation/add/') }}">
                                	<input type="hidden" name="id" value="{{$id}}">
                                    <input type="hidden" name="type" value="{{$type}}">
                                	@csrf
                                    <div class="form-body">
                                        <h3 class="card-title">Informations Personnelles:</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nom</label>
                                                    <input type="text" id="firstName" name="name" class="form-control">
                                                 </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Prenom</label>
                                                    <input type="text" id="lastName" name="prenom" class="form-control ">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Civilité</label>
                                                    <select class="form-control custom-select" name="civilite">
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mme">Mme</option>
                                                        <option value="Mlle">Mlle</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Pays</label>
                                                    <select name="pays" class="form-control custom-select">
                                                        <option value="Usa">Usa</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Italy">Italy</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                     <input type="email" name="email" id="email" class="form-control ">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Téléphone</label>
                                                    <input type="text" name="tele" id="tele" class="form-control ">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <input name="date_start" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hotel</label>
                                                    <input type="text" name="hotel" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Adresse De L'Hotel</label>
                                                    <input type="text" name="hotel_adress" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                           <h3 class="box-title m-t-40">Nombre De Personnes </h3>
                                        <hr>
                                        <!--/row-->
                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Adulte</label>
                                                    <select name="adulte" class="form-control custom-select">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Enfant (-12)</label>
                                                    <select name="enfant" class="form-control custom-select">
                                                    	<option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Enfant (-3)</label>
                                                    <select name="enfant_3" class="form-control custom-select">
                                                    	<option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Réserver maintenant</button>
                                        <button type="button" class="btn btn-inverse">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection