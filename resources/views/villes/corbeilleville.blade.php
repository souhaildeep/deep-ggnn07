@extends('layouts.app')

    <link href="{{ asset('node_modules/footable/css/footable.core.css')}}" rel="stylesheet">

    <!-- page css -->
    <link href="{{ asset('css/pages/footable-page.css')}}" rel="stylesheet">
@section('content')
 <div class="row">             
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Corbeille List</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>        
                                                <th>Ville</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($villes as $ville)
                                            <tr>
                                                <td>{{ $ville->id}}</td>
                                                <td>{{$ville->ville['fr']}}</td>
                                                <td>
                                                    <a  href="{{ url('ville/restore_ville/'.$ville->id)}}" class="btn btn-icon btn-pure btn-outline " ><i class="fa  fa-refresh" aria-hidden="true"></i></a>   
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection


@section('js')

    <script src="{{ asset('node_modules/footable/js/footable.all.min.js')}}"></script>
    <!--FooTable init-->
    <script src="{{ asset('js/pages/footable-init.js')}}"></script>
@endsection