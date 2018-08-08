@extends('layouts.app')
@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <div class="text-center"><img src="../../storage/<?php echo substr_replace($fa->logo,"300x200", -4, 0); ?>"></td></div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                	<h3> &nbsp;<b class="text-danger">Réservation pour : </b></h3>
                                    <div class="pull-left col-md-6">
                                        <address>
                                            
                                            <p class="text-muted m-l-5">
                                            	<b class="text-dark font-weight-bold">Nom et prénom :</b> {{$facture->civilite}} {{$facture->name}} {{ $facture->prenom}}
                                                <br/><b class="text-dark font-weight-bold">Tele : </b> {{ $facture->tele}},
                                                <br/><b class="text-dark font-weight-bold">Email : </b> {{ $facture->email}},
                                                <br/><b class="text-dark font-weight-bold">Pay : </b> {{ $facture->pays}}
                                                <br/><b class="text-dark font-weight-bold">Hotel : </b> {{ $facture->hotel}}
                                                <br/><b class="text-dark font-weight-bold">Adress Hotel : </b> {{ $facture->hotel_adress}}</p>
                                        </address>
                                    </div>
                                    <div class="pull-left text-left col-md-4 col-md-offset-2">
                                        <address>
                                            <p class="text-muted m-l-5">
												<b class="text-dark font-weight-bold">Adulte :</b> {{$facture->adulte}}
                                                <br/><b class="text-dark font-weight-bold">Enfant (-12) : </b> {{ $facture->enfant}},
                                                <br/><b class="text-dark font-weight-bold">Enfant (-3) : </b> {{ $facture->enfant_3}},
                                                <br/><b class="text-dark font-weight-bold">Date : </b> {{ $facture->date_start}}
                                                </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                	
                                    <hr>
                                	<h3> &nbsp;<b class="text-info">Infos Réservation : </b></h3>
                                    <div class="row">
                                        <div class="col-12">
                                         <h4>Titre : <b> {{$ex->titre['fr']}}</b> </h4>   
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Unit Cost</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">{{$facture->id}}</td>
                                                    <td>adulte</td>
                                                    <td class="text-right">{{$facture->adulte}} </td>
                                                    <td class="text-right">{{$facture->prixuniq}} </td>
                                                    <td class="text-right"> <?php echo $facture->adulte*$facture->prixuniq  ?></td>
                                                </tr>
                                                @if ($facture->enfant != 0)
                                                    <tr>
                                                    <td class="text-center">{{$facture->id}}</td>
                                                    <td>Enfant (-12)</td>
                                                    <td class="text-right">{{$facture->enfant}} </td>
                                                    <td class="text-right">
                                                        <?php echo $fa->pourcentage/100*$facture->prixuniq  ?> </td>
                                                    <td class="text-right"> <?php echo $facture->enfant*($fa->pourcentage/100*$facture->prixuniq)  ?></td>
                                                </tr>
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        
                                        <hr>
                                        <h3><b>Total :</b>{{$facture->prixtotale}} Dh</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="row">

                                    
                                        <div class="col-12">
                                            {!!$fa->description['fr']!!}
                                             
                                        </div>
                                    <hr>
                                        <div class="col-12">
                                            {!!$fa->footer['fr']!!}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                      
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('js')
 <script src="{{ asset('js/pages/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
@endsection