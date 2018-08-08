@extends('layouts.app')
@section('style')
 <link href="{{ asset('css/pages/tab-page.css')}}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
   
 
@endsection

@section('content')
		<div class="row" >
                    <div class="col-sm-12">
                        <div class="card card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste d'excursions</h4>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    @foreach($listlg as $langue)
                                      <li class="nav-item"> <a class="nav-link  <?php if($langue->flag =='fr'){echo 'active';}?>   " data-toggle="tab" href="#titre{{$langue->flag}}" role="tab"><span class="hidden-sm-up"><i class="fa  fa-language"></i></span> <span class="hidden-xs-down">{{$langue->flag}}</span></a> </li>
                                    @endforeach
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#plus" role="tab"><span class="hidden-sm-up"><i class="fa  fa-puzzle-piece"></i></span> <span class="hidden-xs-down">Plus</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#images" role="tab"><span class="hidden-sm-up"><i class="fa  fa-picture-o"></i></span> <span class="hidden-xs-down">Images</span></a> </li>
                                </ul>
                                <form class="form-horizontal m-t-40" enctype="multipart/form-data"  method="post" action="{{url('excursion/'.$ex->id) }}" >
                                     <input type="hidden" name="_method" value="PUT">
                                     @csrf
                                <div class="tab-content br-n pn">
                                  @foreach($listlg as $langue)
                                    <div id="titre{{$langue->flag}}"  class="tab-pane  p-20 <?php if($langue->flag =='fr'){echo 'active';}?> "   role="tabpanel">
                                        <div class="row">
                                          <div class="form-group col-12">
                                            <label>Titre</label>
                                            <input type="text" id="titrefr" class="targetDiv form-control" value="{{$ex->titre[$langue->flag]}}" name="{{$langue->flag}}_titre">
                                          </div>
                                          <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea rows="4"class="form-control" rows="4" name="{{$langue->flag}}_description">{{$ex->description[$langue->flag]}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>infos </label>
                                            <textarea rows="4"class="form-control" name="{{$langue->flag}}_information">{{$ex->information[$langue->flag]}}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                    @endforeach
                                 

                                 <div id="plus" class="tab-pane  p-20"  role="tabpanel">
                                   <div class="form-group">
                                      <label for="participants1">Ville</label>
                                        <select class="custom-select form-control required" id="participants1" name="ville">
                                           <option value="">Sélectionner ville</option>
                                              @foreach ($villes as $ville)
                                                <option value="{{ $ville->id }}" {{ $ex->ville == $ville->id  ? 'selected' : ''}}>{{ $ville->ville['fr'] }}</option>
                                               @endforeach
                                        </select>
                                </div>
                            <div class="row" >
                               <div class=" form-group  input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="prix1_4" value="{{$ex->prix1_4}}">
                                    </div>
                                    <div class=" form-group input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="prix5_7" value="{{$ex->prix5_7}}">
                                    </div>
                                    <div class=" form-group input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="text" name="prix0" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$ex->prix0}}">
                                    </div>

                                 </div>
                        
                                 </div>
                                 <div class="tab-pane p-20" id="images" role="tabpanel">
                                   <div class="row" id="app" >
                                                <div class="table-responsive">
                                                        <table class="table">               
                                                            <tbody>
                                                                <tr v-for="(oldav, index) in oldavatar" :key="index">
                                                                    <td><img :src="'../../storage/'+oldav" style="width:100px ; height: 100px"> </td>    
                                                                    <td >
                                                                         <input type="radio"
                                                                             name="portalSelect"
                                                                             v-on:change="firstimage = index"
                                                                             >
                                                                    </td>
                                                                    <td><button  type="button" class="btn btn-info" v-on:click = 'removeImg2(oldav ,index)'><i class="fa fa-trash-o" aria-hidden="true"></i>  Supprimer</button>
                                                                    </td>
                                                                </tr>
                                                                <tr  v-for="avatar in avatars">
                                                                    <td><img :src="avatar" style="width:100px ; height: 100px"> </td>    
                                                                    <td >
                                                                         <input type="radio"
                                                                             name="portalSelect"
                                                                             v-on:change="firstimage = index"
                                                                             >
                                                                    </td>
                                                                    <td><button  type="button" class="btn btn-info" v-on:click = 'removeImg(avatar)'><i class="fa fa-trash-o" aria-hidden="true"></i>  Supprimer</button>
                                                                    </td>
                                                                </tr>                           
                                                            </tbody>
                                                        </table>
                                                    </div>
                                 <div class="col-12">
                                        <div class="form-group">
                                            <label>Ajouter nouveau images :</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input name="image" ref="myFileInput"  id="file" multiple type="file"  @change="GetImage"  class="custom-file-input" >
                                                        <label class="custom-file-label" for="file">Choose file</label>
                                                    </div>
                                                </div>
                                         </div>
                                    </div> 
                                    <div class="col-12">
                                      <input type="button" v-on:click="updateimages" class="btn btn-primary col-12"  value="Ajouter des images" name="">
                                    </div>
                                    
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                                 <div class="row">
                                    <div class="button-group col-12  text-right ">
                                     <input  name="submit" type="submit" value="Update mon Excursion" class="btn btn-md btn-outline-danger">
                                     <button class="btn btn-md btn-outline-success">Annuler</button>
                                    </div>     
                                 </div>
                            </form>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
         

@endsection
@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

     <script>
    window.laravel = {!! json_encode([
        'csrfToken'   => csrf_token(),
        'url'         => url('/'),
        ]) !!};
</script>
<script>

 var app = new Vue({
    el: '#app',
    data :{
        messag : '',
        file : [] , 
            avatars :[],
            oldavatar :[],
            total :0,
            form : new FormData , 
            delet : [],
            i : 0 , 
            id : '',

        },
        methods : {
            alert() {
              
             },
          GetImage(e){
           var i ;
          this.total = e.target.files.length ;
          if (this.file.length) {
            for (i = 0 ; i < this.total; i++) {
             this.file.push(e.target.files[i]);          
            // this.ima[i] = e.target.files[i];
           } 
          }else {
            for (i = 0 ; i < this.total; i++) {
             this.file[i] = e.target.files[i];          
            // this.ima[i] = e.target.files[i];
           } 
          }
              
            this.createImg(this.file);
          },
          //this function for see the image before the upload
          createImg(file){
            
             // this for empty array ,because when i send again new pic ! he show me all picture again!! 
             this.avatars.length = 0;
            
                   for (var i = 0; i < file.length; i++) {
                        var reader = new FileReader();
                        reader.onload = (e) => {
                          this.avatars.push(e.target.result);
                        };
                        reader.readAsDataURL(file[i]);
                    }

            },
          // this for remove image upload
          removeImg(avatar){
              let position = this.avatars.indexOf(avatar);
              this.avatars.splice(position,1);
              this.file.splice(position,1);

              
              },
              // this for remove old image
      removeImg2(sdr , index){
            swal({
                    title: "êtes-vous sûr ?",
                    text: "Une fois supprimé, vous ne pourrez plus récupérer cette image!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                       this.delet[this.i] = sdr;
                        axios.post(window.laravel.url+'/excursion/destroypics', { 'picsdelet': this.delet , 'id': this.id })
                                      .then(response => {
                                       if (response.data.state) {
                                           this.oldavatar.splice(index,1);
                                                   
                                           this.i++;
                                           swal("Votre image a été supprimé!", {
                                            icon: "success",
                                          });
                                       }                                           
                                  })
                                      .catch(error => {
                                      console.log('errors : ' , error);
                                  });
                    } 
            });
      },
    
        updateimages(){
          // insert the new images
          if (this.file.length) {

            for (let i = 0; i < this.file.length; i++) {
                this.form.append('pics[]', this.file[i]);
              }      
            this.form.append('id', this.id);

              axios.post(window.laravel.url+'/excursion/addpics',  this.form  ).then(response =>{
                  swal({
                    title: "Bon travail!",
                    text: "Votre modification et bien passer",
                    icon: "success",
                    button: "merci",
                  });
                 this.$refs.myFileInput.value = '';
                 this.file.length = 0;         
              })
              .catch(error => {
                    console.log('errors : ' , error);
               });
          }
          // delete old images 
         
         

        },
              
       
        },
        mounted : function(){
     
        this.oldavatar = {!! json_encode($ex->images) !!}; 
        this.id = {{$ex->id}}

      },
    })
</script>

@endsection