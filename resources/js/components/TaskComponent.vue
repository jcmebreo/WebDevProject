<template>
    <div>
        <div>
            <table class ="table" v-if= "tasks">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">RGC No.</th>
                        <th scope="col">Course</th>
                        <th scope="col">Division</th>
                        <th scope="col">Annual QPI</th>
                        <th scope="col">Year</th>
                        <th scope="col">Section</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr v-for = "(task, index) in tasks">
                        <td>{{ index + 1 }}</td>
                        <td>{{ task.name }}</td>                  
                        <td>{{ task.body }}</td>
                        <td>{{ task.course }}</td> 
                        <td>{{ task.division }}</td> 
                        <td>{{ task.qpi }}</td>     
                        <td>{{ task.year }}</td>
                        <td>{{ task.section }}</td> 
                        <td>{{ task.status }}</td>          
                        <td><button @click="updateModal(index)" class="btn btn-info">Edit</button></td>                  
                        <td><button @click="deleteTask(index)" class="btn btn-danger">Delete</button></td>                       
                    </tr>
                </tbody>  
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">
                        <button @click="createModal" class="btn btn-success btn-block">Add New Student</button>
                    </td>
                </tfoot>
                                      
            </table>   

            <!-- Modal -->
            <div class="modal fade" 
            id="create-modal" 
            tabindex="-1" 
            role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true"
            >

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insert New Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for = "error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <div class= "form-group">
                        <label for="name">Student Name</label>
                        <input v-model = "task.name" type ="text" id="name" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label for="description">RGC No.</label>
                        <input v-model = "task.body" type ="number" id="description" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label for="course">Course</label>
                        <input v-model = "task.course" type ="text" id="course" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="division">Division</label>
                        <select v-model= "task.division" id="status" class="form-control">
                            <option selected>Choose...</option>
                            <option>Accountancy</option>
                            <option>Business and Management</option>
                            <option>Computer Studies</option>
                            <option>Education</option>
                            <option>Engineering and Architecture</option>
                            <option>Humanities and Letters</option>
                            <option>Natural Science</option>
                            <option>Nursing</option>
                            <option>Social Science</option>       
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qpi">Annual QPI</label>
                        <input v-model= "task.qpi" type="number" id="qpi" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select v-model= "task.year" id="year" class="form-control">
                            <option selected>Choose...</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="section">Section</label>
                        <input v-model= "task.section" type="text" id="section" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select v-model= "task.status" id="status" class="form-control">
                            <option selected>Choose...</option>
                            <option>Regular</option>
                            <option>Irregular</option>
                        </select>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="createTask" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div> 
            <!--  END-->

            <!-- Modal -->
            <div class="modal fade" 
            id="update-modal" 
            tabindex="-1" 
            role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true"
            >

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">{{ error}}</li>
                        </ul>
                    </div>
                    
                    
                    <div class= "form-group">
                        <label for="course">Course</label>
                        <input v-model = "new_update_task.course" type ="text" id="course" class="form-control"> 
                    </div>
                    <div class="form-group">
                            <label for="division">Division</label>
                            <select v-model= "new_update_task.division" id="division" class="form-control">
                            <option selected>Choose...</option>
                            <option>Accountancy</option>
                            <option>Business and Management</option>
                            <option>Computer Studies</option>
                            <option>Education</option>
                            <option>Engineering and Architecture</option>
                            <option>Humanities and Letters</option>
                            <option>Natural Science</option>
                            <option>Nursing</option>
                            <option>Social Science</option>       
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select v-model= "new_update_task.year" id="year" class="form-control">
                            <option selected>Choose...</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select v-model= "new_update_task.status" id="status" class="form-control">
                            <option selected>Choose...</option>
                            <option>Regular</option>
                            <option>Irregular</option>
                        </select>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="updateTask" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div> 
            <!--  END-->
        </div>   
    </div>
</template>

<script>
    export default {

        data(){
            return{
                task:{
                    name:'',
                    body:'',
                    course: '',
                    division: "",
                    qpi: "",
                    year: "",
                    section: "",
                    status: ""
                },
                tasks: [],
                errors: [],
                new_update_task: [],
                uri: 'http://127.0.0.1:8000/tasks/',
                loading:false

            }
        },
        methods:{
            createModal() {
                $("#create-modal").modal("show");
            },

             updateModal(index) {
                 this.errors = [];
                $("#update-modal").modal("show");
                this.new_update_task = this.tasks[index];
            },
            
            createTask() {
                axios.post(this.uri, {name: this.task.name, body: this.task.body, course: this.task.course, division: this.task.division, qpi: this.task.qpi, year: this.task.year, section: this.task.section, status: this.task.status})
                .then(response=>{

                    this.resetData();
                    this.tasks.push(response.data.task);
                    $("#create-modal").modal("hide");
                    toastr.success(response.data.message);
                })

                .catch(error=>{
                    this.errors = [];
                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if(error.response.data.errors.body){
                        this.errors.push(error.response.data.errors.body[0]);
                    }
                    if(error.response.data.errors.course){
                        this.errors.push(error.response.data.errors.course[0]);
                    }
                    if (error.response.data.errors.division) {
                        this.errors.push(error.response.data.errors.divison[0]);
                    }
                    if (error.response.data.errors.qpi) {
                        this.errors.push(error.response.data.errors.qpi[0]);
                    }
                    if (error.response.data.errors.year) {
                        this.errors.push(error.response.data.errors.year[0]);
                    }
                    if (error.response.data.errors.section) {
                        this.errors.push(error.response.data.errors.section[0]);
                    }
                    if (error.response.data.errors.status) {
                        this.errors.push(error.response.data.errors.status[0]);
                    }
                })
            },

            updateTask() {
                axios.patch(this.uri + this.new_update_task.id, {
                    course: this.new_update_task.course,
                    division: this.new_update_task.division,
                    year: this.new_update_task.year,
                    status: this.new_update_task.status
                })
                .then(response=>{
                    $("#update-modal").modal("hide");
                    toastr.success(response.data.message);
                })

                .catch(error=>{
                    this.errors = [];
                    if(error.response.data.errors.course){
                        this.errors.push(error.response.data.errors.course[0]);
                    }
                    if (error.response.data.errors.division) {
                        this.errors.push(error.response.data.errors.divison[0]);
                    }
                    if (error.response.data.errors.year) {
                        this.errors.push(error.response.data.errors.year[0]);
                    } 
                    if (error.response.data.errors.status) {
                        this.errors.push(error.response.data.errors.status[0]);
                    }
                })
            },

            loadTask(){
                axios.get(this.uri).then(response=>{
                    this.tasks = response.data.tasks;
                    this.loading = true;
                })
            },
            
            deleteTask(index) {
                let confirmBox = confirm("Do you want to delete this?");

                if(confirmBox == true){
                    axios.delete(this.uri + this.tasks[index].id)
                    .then(response=>{
                        this.$delete(this.tasks, index);
                        toastr.success(response.data.message);

                    }).catch(error =>{
                        console.log("Cannot delete for special reasons")
                    });
                }

            },

            resetData() {
                this.task.name = "";
                this.task.body = "";
                this.task.course = "";
                this.task.division = "";
                this.task.qpi = "";
                this.task.year = "";
                this.task.section = "";
                this.task.status = "";
            },


        },

        mounted() {
            this.loadTask();
        }
    };
</script>