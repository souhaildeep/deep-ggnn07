@extends('layouts.app')
 <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png')}}">
    <!-- Footable CSS -->
    <link href="{{ asset('node_modules/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{ asset('node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <!-- page css -->
    <link href="{{ asset('css/pages/footable-page.css')}}" rel="stylesheet">


@section('content')
 <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">list des villes</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ville</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($villes as $ville)
                                            <tr>
                                                <td>{{ $ville->id}}</td>
                                                <td>
                                                    <a href="{{ url('ville/modification/'.$ville->id)}}">
                                                    {{$ville->ville['fr']}}
                                                    	</a>
                                                    
                                                </td>
                                                <td>
                                               
                                                        <a href="{{ url('ville/modification/'.$ville->id)}}" class="btn btn-icon btn-pure btn-outline " ><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                
                                                 <form style="display: initial;" action="{{ url('ville/destroyville/'.$ville->id)}}" id="myform" method="post" >
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" style=" color: #fb9678; background-color: transparent;" class="btn btn-icon btn-pure btn-outline "  ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>

                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                              
    <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Ajouter une nouvelle ville</button>
                                                </td>
                                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Add New Contact</h4> </div>
                                                            <div class="modal-body">
                                                                     <form method="post" action="{{url('ville/add')}}" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                @foreach($listlg as $langue)
                                                                <div class="form-group row">
                                                                    <label for="titleid" class="col-sm-4 col-form-label">Ville ({{$langue->name}})</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="{{$langue->flag}}_ville" type="text" class="form-control" id="titleid" >
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                               
                                                           

                                                                <div class="form-group row">
                                                                    <div class="offset-sm-3 col-sm-9">
                                                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                                                    </div>
                                                                </div>
                                                            </form>      
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
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
                    <div>
                        
                    </div>
                </div>
@endsection

@section('js')
	<!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Footable -->
    <script src="{{ asset('node_modules/footable/js/footable.all.min.js')}}"></script>
    <!--FooTable init-->
    <script src="{{ asset('js/pages/footable-init.js')}}"></script>
  <!-- Popup message jquery -->
    <script src="{{ asset('node_modules/toast-master/js/jquery.toast.js')}}"></script>


<script>


  @if(Session::has('success'))
  
        $.toast({
        heading: 'Success',
        text: "{{ session()->get('success') }}",
        showHideTransition: 'slide',
        icon: 'success'
})
  @endif

  @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
  @endif


  @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
  @endif


  @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
  @endif


</script>
@endsection