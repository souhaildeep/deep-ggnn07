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
                                <h4 class="card-title">Réservation list</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Client</th>
                                                <th>Tele</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Prix Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($listlres as $list)
                                            <tr>
                                                <td>{{ $list->id}}</td>
                                                <td>{{ $list->name}} {{ $list->prenom}} </td>
                                                <td>{{ $list->tele}}</td>
                                                <td>{{ $list->email}}</td>
                                                <td>{{ $list->date_start}}</td>
                                                <td>{{ $list->prixtotale}}</td>
                                                <td>
                                                    <a  href="{{ url('reservation/facture/'.$list->id)}}" class="btn btn-sm btn-icon btn-pure btn-outline " ><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                                                     <form style="display: inline ;" action="{{ url('reservation/destroyreserv/'.$list->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" style=" color: #fb9678; background-color: transparent;" class="btn  btn-icon btn-pure btn-outline " ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                                    
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