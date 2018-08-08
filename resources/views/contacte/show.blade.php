@extends('layouts.app')
 <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png')}}">
    <!-- Footable CSS -->
    <link href="{{ asset('node_modules/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{ asset('node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <!-- page css -->
    <link href="{{ asset('css/pages/footable-page.css')}}" rel="stylesheet">


@section('content')
 <div class="row">
                    
                    <div class="col-12 " >
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Parametre de page Contacte </h4>
                                <h6 class="card-subtitle text-right"><a href="{{ url('contact/add')}}" class="btn btn-md btn-info">Ajouter</a>
                                
                                </h6>
                                <div class="table-responsive ">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list " data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>                     
                                                <th>Adress</th>
                                                <th>Telephone</th>
                                                <th>Réseau social</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($contacts as $contact)
                                            <tr>
                                                <td>
                                                    {{$contact->titre['fr']}}
                                                </td>
                                                
                                                <td>
                                                     {{$contact->adress}} 
                                                </td>
                                                <td>{{$contact->tele}}</td>
                                                 <td>{{$contact->socialnet['fb']}}</td>
                                                <td>
                                                    <a href="{{ url('contact/modification/'.$contact->id)}}" class="btn btn-icon btn-pure btn-outline " ><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                              
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