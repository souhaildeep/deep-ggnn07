
@extends('layouts.app')

@section('style')
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
      
                <!-- Validation wizard -->

                 <div class="row" id="app" >

                    <div class="col-12" >
                        <div class="card wizard-content" >
                            <div class="card-body">
                                <h4 class="card-title">Step wizard with validation</h4>
                                <h6 class="card-subtitle">You can us the validation like what we did</h6>
                                <form enctype="multipart/form-data" id="form"  name="form"  method="POST" v-on:submit.prevent="addAnnonce" class=" wizard-circle">
                                     @csrf

                                    <!-- Step 1 => take title-->
                                    <h6>Étape 1</h6>

                                    <section>
                                        <div class="row">
                                            @foreach($listlg as $langue)
                                            <div class="col-md-6">
                                                    
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Titre ({{$langue->name}}) : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="wfirstName2" v-model="excursion.{{$langue->flag}}_titre">
                                                </div>
                                                
                                            </div>
                                            @endforeach
                                        </div>

                                    </section>
                                    <!-- Step 2 => take disc -->
                                    <h6>Étape 2</h6>
                                    <section>
                                        <div class="row">
                                            @foreach($listlg as $langue)
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Description({{$langue->name}}) :</label>
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <textarea  class="form-control" rows="4" v-model="excursion.{{$langue->flag}}_description" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach                                    
                                        </div>
                                    </section>
                                    <!-- Step 3 => take infos -->
                                    <h6>Étape 3</h6>
                                    <section>
                                        <div class="row">
                                             @foreach($listlg as $langue)
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Infos ({{$langue->name}}) :</label>
                                                    <div class="card">
                                                     <textarea  class="form-control" rows="4" v-model="excursion.{{$langue->flag}}_information"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach 
                                            
                                        </div>
                                    </section>
                                    <!-- Step 4 => take ( city , price , images )-->
                                    <h6>Étape 4</h6>
                                    <section> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="participants1">Ville</label>
                                                    <select class="custom-select form-control required" id="participants1" name="ville" v-model="excursion.ville">
                                                        <option value="">Sélectionner ville</option>
                                                        @foreach ($villes as $ville)
                                                         <option value="{{ $ville->id }}">{{ $ville->ville['fr'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Prix 1 ~ 4 :<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  name="prix1_4" v-model="excursion.prix1_4"> </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Prix 5 ~ 7 :<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="prix5_7" v-model="excursion.prix5_7"> </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Prix 0 : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  name="prix0" v-model="excursion.prix0"> </div>
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                        </div> 
                                        <div class="row" >
                                            <div class="col-12" v-if="hide">
                                               <div class="card" >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">               
                                                            <tbody>
                                                                <tr v-for="(avatar , index) in avatars">
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
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12">
                                            <div class="form-group">
                                                <label>Custom File upload</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input name="file2" id="file" multiple type="file"  @change="GetImage"  class="custom-file-input" >
                                                        <label class="custom-file-label" for="file">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                             </div> 
                                         </div>               
                                       
                                    </section>

                                    <div  >
                                            @{{messag}}

                                          <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Prévisualiser mon annonce</button>
                                    </div>
                                   
                                </form>

                            </div>
                        </div>
                    </div>
                     
                   

                    </div>
                 
                     
         
                <!-- ============================================================== -->
          


                <!-- End PAge Content -->


@endsection
@section('js')
     <!--stickey kit -->

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
        messag : 'hello',

       excursion:{
                fr_titre : '',
                us_titre : '',
                es_titre : '',
                de_titre : '',
                pt_titre : '',
                it_titre : '',
                ne_titre : '',
                ru_titre : '',   
                fr_description : '',
                us_description : '',
                es_description : '',
                de_description : '',
                pt_description : '',
                it_description : '',
                ne_description : '',
                ru_description : '', 
                fr_information : '',
                us_information : '',
                es_information : '',
                de_information : '',
                pt_information : '',
                it_information : '',
                ne_information : '',
                ru_information : '',
                ville : '',
                prix1_4 : '',
                prix5_7 : '',
                prix0 : '',
            },

            hide : false,
            file : [] , 
          //  file2 : [],
            avatars :[],
            total :0,
            firstimage : '',
            firstimage2 : [],
            form : new FormData , 
        },
        methods : {
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
        createImg(file){
            this.hide = true,
            this.avatars.length = 0; // this for empty array ,because when i send again new pic ! he show me all picture again!! 
            
                   for (var i = 0; i < file.length; i++) {
                        var reader = new FileReader();
                        reader.onload = (e) => {
                          this.avatars.push(e.target.result);
                        };
                        reader.readAsDataURL(file[i]);
                    }
                      // this.file2 = this.file;
            },
          // this for remove image
        removeImg(avatar){
              let position = this.avatars.indexOf(avatar);
              this.avatars.splice(position,1);
              this.file.splice(position,1);
             // this.file2 = this.file;
              },
          //add  images to excursions row
        addAnnonce(){
            this.firstimage2 = this.file[this.firstimage]; 
            console.log(this.firstimage2)
            console.log(this.file);
            
          console.log('response : ' , this.excursion);
           for (let i = 0; i < this.file.length; i++) {
                this.form.append('pics[]', this.file[i]);
            }
                this.form.append('first', this.firstimage2);
                this.form.append('fr_titre', this.excursion.fr_titre);
                this.form.append('us_titre', this.excursion.us_titre);
                this.form.append('es_titre', this.excursion.es_titre);
                this.form.append('de_titre', this.excursion.de_titre);
                this.form.append('pt_titre', this.excursion.pt_titre);
                this.form.append('it_titre', this.excursion.it_titre);
                this.form.append(' ne_titre', this.excursion.ne_titre);
                this.form.append('ru_titre', this.excursion.ru_titre);   
                this.form.append('fr_description', this.excursion.fr_description);
                this.form.append('us_description', this.excursion.us_description);
                this.form.append('es_description', this.excursion.es_description);
                this.form.append('de_description', this.excursion.de_description);
                this.form.append('pt_description', this.excursion.pt_description);
                this.form.append('it_description', this.excursion.it_description);
                this.form.append('ne_description', this.excursion.ne_description);
                this.form.append('ru_description', this.excursion.ru_description); 
                this.form.append('fr_information', this.excursion.fr_information);
                this.form.append('us_information', this.excursion.us_information);
                this.form.append('es_information', this.excursion.es_information);
                this.form.append('de_information', this.excursion.de_information);
                this.form.append('pt_information', this.excursion.pt_information);
                this.form.append('it_information', this.excursion.it_information);
               this.form.append(' ne_information', this.excursion.ne_information);
               this.form.append(' ru_information', this.excursion.ru_information);
               this.form.append(' ville', this.excursion.ville);
               this.form.append(' prix1_4', this.excursion.prix1_4);
               this.form.append(' prix5_7', this.excursion.prix5_7);
               this.form.append(' prix0', this.excursion.prix0);
             
          axios.post(window.laravel.url+'/excursion/add', this.form ).then(response =>{
              //console.log(response);
              if (response.data.state) {
                console.log('helllooo');
                 window.location.href = window.laravel.url+'/excursion/list';
              }
             
           })
          .catch(error => {
                    console.log('errors : ' , error);
                })
        
        },
        },
    })
</script>
     

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