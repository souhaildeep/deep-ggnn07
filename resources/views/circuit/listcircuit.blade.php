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
                                <h4 class="card-title">Contact  list</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Titre</th>
                                                <th>Ville</th>
                                                <th>Prix (1 ~ 4)</th>
                                                <th>Prix (5 ~ 7)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($lists as $list)
                                            <tr>
                                                <td>{{ $list->id}}</td>
                                                <td>
                                                   <!-- <a href="{{ url('circuit/'.str_slug($list->titre['fr'] , '-').'-'.$list->id)}}">
                                                    	{{$list->titre['fr']}}</a>!-->
                                                        <a href="{{ url('circuit/'.$list->id.'/'.str_slug($list->titre['fr'] , '-'))}}">
                                                        {{$list->titre['fr']}}</a>
                                                </td>
                                                <td>{{ $list->ville}}</td>
                                                <td>{{ $list->prix1_4}}</td>
                                                <td>{{ $list->prix5_7}}</td>
                                                <td>
                                                    @if ($list->top === 1)
                                                        <a href="{{ url('circuite/update_top/'.$list->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="{{ url('circuite/update_top/'.$list->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    @endif
                                                    
                                                    <a  href="{{ url('circuite/update_active/'.$list->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    <a href="{{ url('circuit/'.$list->id.'/'.str_slug($list->titre['fr'] , '-'))}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <a  href="{{ url('reservation/circuit/add/'.$list->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><i class="fa fa-clipboard" aria-hidden="true"></i></a>
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