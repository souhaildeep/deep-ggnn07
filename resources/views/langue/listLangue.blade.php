@extends('layouts.app')

@section('style')
<link href="{{ asset('css/pages/icon-page.css')}}" rel="stylesheet">
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
@endsection
@section('content')
 <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contact  list</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Titre</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($langues as $langue)
                                            <tr>
                                                <td>{{ $langue->id}}</td>
                                                <td><i class="flag-icon flag-icon-{{$langue->flag}}" title="zw" id="zw"></i> {{ $langue->name}}</td>
                                                <td>
                                                    @if ($langue->active === 1)
                                                        <a href="{{ url('langue/activer/'.$langue->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><span class="label label-success">Activer</span></a>
                                                    @else
                                                        <a href="{{ url('langue/activer/'.$langue->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><span class="label label-danger">Désactiver</span></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                       
@endsection
@section('js')
<script src="{{ asset('node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
@endsection