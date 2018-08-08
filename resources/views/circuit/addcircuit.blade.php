
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

                 <div class="row"  id="app" >

                    <div class="col-12" >
                        <div class="card wizard-content" >
                            <div class="card-body">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    @foreach($listlg as $langue)    
                                      <li class="nav-item"> <a class="nav-link <?php if($langue->flag =='fr'){echo 'active';}?>  " data-toggle="tab" href="#titre{{$langue->flag}}" role="tab"><span class="hidden-sm-up"><i class="fa  fa-language"></i></span> <span class="hidden-xs-down">{{$langue->flag}}</span></a> </li>
                                    @endforeach
                                </ul>
                                <form enctype="multipart/form-data" id="form"  name="form"  method="POST" v-on:submit.prevent="addAnnonce" class=" wizard-circle">
                                     @csrf
                                <div class="tab-content br-n pn">
                                    @foreach($listlg as $langue)
                                   
                                     <div id="titre{{$langue->flag}}"  class="tab-pane  p-20 <?php if($langue->flag =='fr'){echo 'active';}?> "  role="tabpanel">
                                        <div class="row">
                                          <div class="form-group col-12">
                                            <label>Titre ({{$langue->name}})</label>
                                            <input type="text"  class="targetDiv form-control"  v-model="circuit.{{$langue->flag}}_titre">
                                          </div>
                                          <div class="form-group col-12">
                                            <label>description ({{$langue->name}})</label>
                                            <textarea rows="4"class="form-control" rows="4" v-model="circuit.{{$langue->flag}}_description"></textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>infos ({{$langue->name}})</label>
                                            <textarea rows="4"class="form-control" v-model="circuit.{{$langue->flag}}_information"></textarea>
                                          </div>
                                        </div>
                                        <div class="row" >
                                             <div class="col-md-2">
                                                <table>
                                                    <tr  v-for="(planday, index) in plansday">
                                                        <td><label for="wfirstName2"> N° Joure ({{$langue->flag}}):<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  v-model="planday.{{$langue->flag}}_joure">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-4" >
                                                <table>
                                                    <tr v-for="(plantitre, index) in planstitre">
                                                      <td><label for="wlastName2"> Titre ({{$langue->name}}):<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  v-model="plantitre.{{$langue->flag}}_plantitre"> </td>  
                                                    </tr>
                                                </table>
                                                
                                            </div>
                                             <div class="col-md-4" >
                                                <table>
                                                    <tr v-for="(plandesc, index) in plansdesc">
                                                        <td>
                                                            <label for="wfirstName2"> Description ({{$langue->name}}):<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  v-model="plandesc.{{$langue->flag}}_plandescription">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-1" >
                                                <table>
                                                    <tr v-for="(plandesc, index) in plansdesc">
                                                        <td >
                                                            <button style=" margin-top: 35%;" type="button" class="btn btn-primary btn-sm" @click="deleteRow(index)">Supprimer</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        
                                </div>
                                @endforeach
                                    <button @click="addRow" type="button" class="btn btn-primary btn-sm">Add row</button>
                              
                                </div>
 <hr>
                                    <section> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="participants1">Ville</label>
                                                    <select class="custom-select form-control required" id="participants1" name="ville" v-model="circuit.ville">
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
                                                    <input type="text" class="form-control required"  name="prix1_4" v-model="circuit.prix1_4"> </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Prix 5 ~ 7 :<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="prix5_7" v-model="circuit.prix5_7"> </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Prix 0 : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  name="prix0" v-model="circuit.prix0"> </div>
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
        plansday: [],
        planstitre : [],
        plansdesc : [],
       circuit:{
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
                
                fr_joure: '',
                us_joure: '',
                es_joure: '',
                de_joure: '',
                pt_joure: '',
                it_joure: '',
                ne_joure : '',
                ru_joure: '',
                fr_plandescription : '',
                us_plandescription : '',
                es_plandescription : '',
                de_plandescription : '',
                pt_plandescription : '',
                it_plandescription : '',
                ne_plandescription : '',
                ru_plandescription : '',                
                fr_plantitre : '',
                us_plantitre : '',
                es_plantitre : '',
                de_plantitre : '',
                pt_plantitre : '',
                it_plantitre : '',
                ne_plantitre : '',
                ru_plantitre : '',
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
            plans:0,
            firstimage : '',
            firstimage2 : [],
            form : new FormData , 
        },
        methods : {
             addRow() {
        this.plans += 1 ;
      this.plansday.push({
            fr_joure: '',
            us_joure: '',
            es_joure: '',
            de_joure: '',
            pt_joure: '',
            it_joure: '',
            ne_joure : '',
            ru_joure: '',   
      });

       this.planstitre.push({
            fr_plantitre : '',
                us_plantitre : '',
                es_plantitre : '',
                de_plantitre : '',
                pt_plantitre : '',
                it_plantitre : '',
                ne_plantitre : '',
                ru_plantitre : '', 
      });
        this.plansdesc.push({
         fr_plandescription : '',
                us_plandescription : '',
                es_plandescription : '',
                de_plandescription : '',
                pt_plandescription : '',
                it_plandescription : '',
                ne_plandescription : '',
                ru_plandescription : '',                
                  
      })
    },
    deleteRow(index) {
        this.plans -= 1 ;
     this.plansday.splice(index,1);
     this.planstitre.splice(index,1);
     this.plansdesc.splice(index,1)
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
          //add  images to circuits row
        addAnnonce(){
            this.firstimage2 = this.file[this.firstimage]; 
            for (let i = 0; i < this.file.length; i++) {
                this.form.append('pics[]', this.file[i]);
            }

            for (let i = 0; i < this.plansday.length; i++) {
                this.form.append('plansday[]', this.plansday[i].fr_joure);
                this.form.append('plansday[]', this.plansday[i].us_joure);
                this.form.append('plansday[]', this.plansday[i].es_joure);
                this.form.append('plansday[]', this.plansday[i].de_joure);
                this.form.append('plansday[]', this.plansday[i].pt_joure);
                this.form.append('plansday[]', this.plansday[i].it_joure);
                this.form.append('plansday[]', this.plansday[i].ne_joure);
                this.form.append('plansday[]', this.plansday[i].ru_joure);
            }
            for (let i = 0; i < this.planstitre.length; i++) {
                this.form.append('planstitre[]', this.planstitre[i].fr_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].us_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].es_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].de_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].pt_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].it_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].ne_plantitre);
                this.form.append('planstitre[]', this.planstitre[i].ru_plantitre);
            }
            for (let i = 0; i < this.plansdesc.length; i++) {
                this.form.append('plansdesc[]', this.plansdesc[i].fr_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].us_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].es_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].de_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].pt_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].it_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].ne_plandescription);
                this.form.append('plansdesc[]', this.plansdesc[i].ru_plandescription);
            }
                    
                //choise first pic and set it in form data
                this.form.append('first', this.firstimage2);
                //set all title in form data
                this.form.append('fr_titre', this.circuit.fr_titre);
                this.form.append('us_titre', this.circuit.us_titre);
                this.form.append('es_titre', this.circuit.es_titre);
                this.form.append('de_titre', this.circuit.de_titre);
                this.form.append('pt_titre', this.circuit.pt_titre);
                this.form.append('it_titre', this.circuit.it_titre);
                this.form.append(' ne_titre', this.circuit.ne_titre);
                this.form.append('ru_titre', this.circuit.ru_titre); 
                //set all description in form data
                this.form.append('fr_description', this.circuit.fr_description);
                this.form.append('us_description', this.circuit.us_description);
                this.form.append('es_description', this.circuit.es_description);
                this.form.append('de_description', this.circuit.de_description);
                this.form.append('pt_description', this.circuit.pt_description);
                this.form.append('it_description', this.circuit.it_description);
                this.form.append('ne_description', this.circuit.ne_description);
                this.form.append('ru_description', this.circuit.ru_description); 
                //set all infos in form data
                this.form.append('fr_information', this.circuit.fr_information);
                this.form.append('us_information', this.circuit.us_information);
                this.form.append('es_information', this.circuit.es_information);
                this.form.append('de_information', this.circuit.de_information);
                this.form.append('pt_information', this.circuit.pt_information);
                this.form.append('it_information', this.circuit.it_information);
               this.form.append(' ne_information', this.circuit.ne_information);
               this.form.append(' ru_information', this.circuit.ru_information);
               //
               //
               this.form.append('plans',this.plans);
               this.form.append(' ville', this.circuit.ville);
               this.form.append(' prix1_4', this.circuit.prix1_4);
               this.form.append(' prix5_7', this.circuit.prix5_7);
               this.form.append(' prix0', this.circuit.prix0);
             
           
          axios.post(window.laravel.url+'/circuit/add',this.form ).then(response =>{
              //console.log(response);
              if (response.data.state) {
                
                 window.location.href = window.laravel.url+'/circuit/list';
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