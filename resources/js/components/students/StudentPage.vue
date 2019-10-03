<template>
    <div class="row">
        <div class="col-12">
            <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="tile-title">Registered Subjects</h3>
              <p><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-plus"></i>Add Subject	</a></p>
            </div>

                <table class="table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>Subject Code</th>
                      <th>Subject Name</th>
                      <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                    </tr>
                  </thead>
                  
                    <tbody  v-for="registeredsubject in registeredsubjects">
                        
                            <tr v-for="subject in subjects" v-if="registeredsubject == subject.id" >
                              <td>{{subject.subject_code}}</td>
                              <td>{{subject.subject_name}}</td>
                              <td class="text-center">
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              </td>
                              
                            </tr> 
                    </tbody>
                  
                </table>
            </div>
          </div>
        </div>
          
</template>
<script>
export default {
    props:{
      studentid:Number,
      registrationid:Number,
    },
    data(){
        return {
          registeredsubjects:{},
          subjects:{},
          index:0,
        }
    },
    created(){
        this.loadRegisteredSubjects();
        this.loadSubjects();
    },
    methods: {
        loadRegisteredSubjects(){
            // axios.get('/admin/registrations/'+this.registrationid+'/show')
            //       .then(
            //             ({response}) => (this.registration = response.data)
            //             )
            axios.get('/admin/registrations/'+this.registrationid+'/show')
                .then((response) =>  {this.registeredsubjects = response.data })
                .catch(error => {
                  this.errors = [];
                  console.log(error);
              });
                  
        },
        loadSubjects(){
           axios.get('/admin/subjects/loadsubjects')
                .then((response) => {
                      this.subjects = response.data
                })
                .catch(error => {
                  this.errors = [];
                  console.log(error);
                })
        },
        increment(){
          this.index++
        }
    }

}
</script>