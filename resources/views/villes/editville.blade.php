@extends('layouts.app')

@section('content')
 <div class="row">
    <div class="card col-12">
    <div class="card-body">
    <form class="form-horizontal m-t-40" enctype="multipart/form-data"  method="post" action="{{url('ville/'.$ville->id) }}">
        <input type="hidden" name="_method" value="PUT">
                                     @csrf
            <div class="row">
                @foreach($listlg as $langue)
                <div class="col-md-6">
                    <div class="form-group">
                         <label for="wfirstName2"> Ville ({{$langue->name}}) : <span class="danger">*</span> </label>
                         <input type="text" class="form-control required" id="wfirstName2" name="{{$langue->flag}}_ville" value="{{$ville->ville['fr']}}"> 
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                         <button type="submit" class="btn btn-lg btn-outline-success">Modifier</button> 
                          <button  class="btn btn-lg btn-outline-danger">Annuler</button> 
                    </div>
                </div>

            </div>




</form>
</div>
</div>
 </div>
@endsection

@section('js')




@endsection