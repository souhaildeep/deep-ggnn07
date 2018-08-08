@extends('layouts.app')
@section('content')
		<div class="row">
                    <div class="col-sm-12">
                      <div class="card card-body">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Modifier Devise :</h3>
                              
                                <form class="form-horizontal m-t-40" enctype="multipart/form-data"  method="post" >
                                     <input type="hidden" name="_method" value="PUT">
                                     @csrf
                                     <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Devise</label>
                                                    <input type="text" name="slug" class="form-control" value="{{$dv->slug}}">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Symbole </label>
                                                    <input type="text" name="symbole" class="form-control" value="{{$dv->symbole}}">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Valeur</label>
                                                    <input type="text" name="convert_value" value="{{$dv->convert_value}}" class="form-control" >
                                                </div>
                                            </div>                                            
                                            <!--/span-->
                                        </div>  
                                        <div class="row">
                                          <div class="col-12">
                                            <input type="submit" value="Modifier" class="btn btn-success">
                                          </div>
                                        </div>                           
                              </form>
                        </div>
                    </div>
                </div>
         </div>
  </div>

@endsection