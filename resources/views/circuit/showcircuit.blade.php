@extends('layouts.app')
@section('style')
 <link href="{{ asset('css/pages/tab-page.css')}}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
   
 
@endsection

@section('content')
        <div class="row" id="app"  >
                <div class="col-sm-12">
                      <div class="card card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    @foreach($listlg as $langue)
                                      <li class="nav-item"> <a class="nav-link  <?php if($langue->flag =='fr'){echo 'active';}?>   " data-toggle="tab" href="#titre{{$langue->flag}}" role="tab"><span class="hidden-sm-up"><i class="fa  fa-language"></i></span> <span class="hidden-xs-down">{{$langue->flag}}</span></a> </li>
                                    @endforeach
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#plus" role="tab"><span class="hidden-sm-up"><i class="fa  fa-puzzle-piece"></i></span> <span class="hidden-xs-down">Plus</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#images" role="tab"><span class="hidden-sm-up"><i class="fa  fa-picture-o"></i></span> <span class="hidden-xs-down">Images</span></a> </li>
                                </ul>
                                <form  class="form-horizontal m-t-40" enctype="multipart/form-data"  method="post" >
                                   
                                     @csrf
                                <div class="tab-content br-n pn" >
                                  @foreach($listlg as $langue)
                                    <div id="titre{{$langue->flag}}"  class="tab-pane  p-20 <?php if($langue->flag =='fr'){echo 'active';}?> "   role="tabpanel">
                                        <div class="row">
                                          <div class="form-group col-12">
                                            <label>Titre</label>
                                            <input type="text" id="titrefr" class="targetDiv form-control"  v-model="circuit.titre.{{$langue->flag}}">
                                          </div>
                                          <div class="form-group col-12">
                                            <label>description</label>
                                            <textarea rows="4"class="form-control" rows="4"  v-model="circuit.description.{{$langue->flag}}">{{$circuit->description[$langue->flag]}}</textarea>
                                          </div>
                                          <div class="form-group col-12">
                                            <label>infos </label>
                                            <textarea rows="4"class="form-control"  v-model="circuit.information.{{$langue->flag}}">{{$circuit->information[$langue->flag]}}</textarea>
                                          </div>
                                        </div>
                                        <div class="row" >
                                             <div class="col-md-2">
                                                <table>
                                                    <tr  v-for="(planday, index) in plansday">
                                                        <td><label for="wfirstName2"> N° Joure ({{$langue->flag}}):<span class="danger">*</span> </label>

                                                    <input type="text" class="form-control required"  v-model="planday.{{$langue->flag}}">
                                                     

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-4" >
                                                <table>
                                                    <tr v-for="(plantitre, index) in planstitre">
                                                      <td><label for="wlastName2"> Titre ({{$langue->name}}):<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  v-model="plantitre.{{$langue->flag}}"> </td>  
                                                    </tr>
                                                </table>
                                                
                                            </div>
                                             <div class="col-md-4" >
                                                <table>
                                                    <tr v-for="(plandesc, index) in plansdesc">
                                                        <td>
                                                            <label for="wfirstName2"> Description ({{$langue->name}}):<span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required"  v-model="plandesc.{{$langue->flag}}">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-1" >
                                                <table>
                                                    <tr v-for="(plandesc,index) in plansdesc">
                                                        <td >
                                                            <button style=" margin-top: 35%;" type="button" class="btn btn-primary btn-sm" @click="deleteRow(index)">Supprimer</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <button @click="addRow" type="button" class="btn btn-primary btn-sm">Add row</button>
                                    </div>
                                    @endforeach
                                 
                                    
                                 <div id="plus" class="tab-pane  p-20"  role="tabpanel">
                                   <div class="form-group">
                                      <label for="participants1">Ville</label>
                                        <select class="custom-select form-control required" id="participants1"  v-model="circuit.ville">
                                           <option value="">Sélectionner ville</option>
                                              @foreach ($villes as $ville)
                                                <option value="{{ $ville->id }}" {{ $circuit->ville == $ville->id  ? 'selected' : ''}}>{{ $ville->ville['fr'] }}</option>
                                               @endforeach
                                        </select>
                                   </div>
                                   <div class="row" >
                                      <div class=" form-group  input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"  v-model="circuit.prix1_4">
                                      </div>
                                      <div class=" form-group input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"  v-model="circuit.prix5_7">
                                      </div>
                                      <div class=" form-group input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"  v-model="circuit.prix0">
                                      </div>
                                    </div>                        
                                 </div>
                                 <div class="tab-pane p-20" id="images" role="tabpanel">
                                   <div class="row" >                                 
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
                                                        <input name="image" id="file" multiple type="file"  @change="GetImage" ref="myFileInput" class="custom-file-input" >
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
                                <div class="row">
                                    <div class="button-group col-12  text-right ">
                                      <input  type="button" v-on:click="updatcircuit" type="submit" value="Update mon Circuit" class="btn btn-md btn-outline-danger">
                                     <button class="btn btn-md btn-outline-success">Annuler</button>
                                    </div>     
                                 </div>
                                    
                                 </form>
                                 
                              </div>
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
        circuit : {
          description : '', 
          information : '',
          prix0 : '',
          prix1_4 : '',
          prix5_7 : '',
          titre : '',
          ville : '',
        },
        circuits : [],
        allplans : [],
        plansday: [],
        planstitre : [],
        plansdesc : [],
        plansid : [],
        file : [] , 
        avatars :[],
        oldavatar :[],
        total :0,
        form : new FormData , 
        delet : [],
        i : 0 , 
        id : '',
        plans : 0,
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
                  
      });
        //this.plansid.push(this.plansid.length+1)
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
          //this function for see the image before the upload
          createImg(file){
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
                        axios.post(window.laravel.url+'/circuit/destroypics', { 'picsdelet': this.delet , 'id': this.id })
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
        // update circuit
        updatcircuit(){

           this.plans = this.plansday.length;
         this.form.append('plans',this.plans); 
          for (let i = 0; i < this.plansday.length; i++) {
                this.form.append('plansday[]', this.plansday[i].fr);
                this.form.append('plansday[]', this.plansday[i].us);
                this.form.append('plansday[]', this.plansday[i].es);
                this.form.append('plansday[]', this.plansday[i].de);
                this.form.append('plansday[]', this.plansday[i].pt);
                this.form.append('plansday[]', this.plansday[i].it);
                this.form.append('plansday[]', this.plansday[i].ne);
                this.form.append('plansday[]', this.plansday[i].ru);
            }
            for (let i = 0; i < this.planstitre.length; i++) {
                this.form.append('planstitre[]', this.planstitre[i].fr);
                this.form.append('planstitre[]', this.planstitre[i].us);
                this.form.append('planstitre[]', this.planstitre[i].es);
                this.form.append('planstitre[]', this.planstitre[i].de);
                this.form.append('planstitre[]', this.planstitre[i].pt);
                this.form.append('planstitre[]', this.planstitre[i].it);
                this.form.append('planstitre[]', this.planstitre[i].ne);
                this.form.append('planstitre[]', this.planstitre[i].ru);
            }
            for (let i = 0; i < this.plansdesc.length; i++) {
                this.form.append('plansdesc[]', this.plansdesc[i].fr);
                this.form.append('plansdesc[]', this.plansdesc[i].us);
                this.form.append('plansdesc[]', this.plansdesc[i].es);
                this.form.append('plansdesc[]', this.plansdesc[i].de);
                this.form.append('plansdesc[]', this.plansdesc[i].pt);
                this.form.append('plansdesc[]', this.plansdesc[i].it);
                this.form.append('plansdesc[]', this.plansdesc[i].ne);
                this.form.append('plansdesc[]', this.plansdesc[i].ru);
            }
             this.form.append('cir', JSON.stringify(this.circuit));
             this.form.append('id', this.id);

          axios.post(window.laravel.url+'/circuit/updateall', this.form).then( (response) =>{
                if (response.data.state) {
                    swal({
                      title: "Bon travail!!",
                      text: "Votre modification a bien été passée!",
                      icon: "success",
                      button : null,
                    });
                    setTimeout(function() {
                          window.location.href = window.laravel.url+'/circuit/list';
                    }, 1000);                    
                }
                 
              })
              .catch(function (error) {
                console.log(error); // run if we have error
              });
       
        },
        updateimages(){  
          if (this.file.length) {
            const fd = new FormData();
            for (let i = 0; i < this.file.length; i++) {
                fd.append('pics[]', this.file[i]);
              }      
            fd.append('id', this.id);

              axios.post(window.laravel.url+'/circuit/addpics', fd ).then(response =>{
                swal({
                    title: "Bon travail!",
                    text: "Votre modification a bien été passée",
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
          // delete old images */
         
         

        },
              
       
        },
        mounted : function(){
        this.circuits= {!! json_encode($circuit) !!};
        this.circuit.prix0 = this.circuits.prix0;
        this.circuit.prix1_4 = this.circuits.prix1_4;
        this.circuit.prix5_7 = this.circuits.prix5_7;
        this.circuit.ville = this.circuits.ville;
        this.circuit.titre = this.circuits.titre;
        this.circuit.description = this.circuits.description;
        this.circuit.information = this.circuits.information;
        this.oldavatar = {!! json_encode($circuit->images) !!}; 
        this.allplans = {!! json_encode($circuit->plans) !!}; 
        for (let i = 0; i < this.allplans.length; i++) {
                this.plansday.push(this.allplans[i].jour);
                this.planstitre.push(this.allplans[i].titre);
                this.plansdesc.push(this.allplans[i].description);
                //this.plansid.push(this.allplans[i].id);
            }
        this.id = {{$circuit->id}};
        

      },
    })
</script>

@endsection