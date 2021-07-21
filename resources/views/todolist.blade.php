<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Content | Todolist</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Vuejs CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <!-- Vuejs CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container">
       <div id="app">
        
        <!-- Modal -->
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">List Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                          
                               <div class="form-group">
                                   <label class="font-weight-bold">Title :</label>
                                   <input type="text" v-model="title" class="form-control">
                                   <label class="font-weight-bold">Content :</label>
                                   <textarea class="form-control" v-model="content" rows="10"></textarea>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" v-on:click="saveForm" class="btn btn-primary">Save</button>    
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


            <div class="row justify-content-center my-4">
                <div class="col-md-8">
                   <a href="javascript:;" @click="openForm" type="button" class="btn btn-primary btn-md float-right">Tambah</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
        
                            <table class="table table-bordered">
                                <tbody>
                                    <tr v-for="item in data_list">
                                        <td>@{{item.title}}</td>
                                        <td>@{{item.content}}</td>
                                    </tr>
                                    <tr v-if="!data_list.length">
                                        <td>Data available</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>

                </div>
            </div>
       </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
       
    <script>
        var vue = new Vue({
            el: "#app",
            mounted(){
                this.getIndex();
            },
            data: {
               
                data_list:[],
                title:"",
                content:""  
            },
            methods:{
                openForm: function(){
                    $('#modal-form').modal('show');
                },
                saveForm: function(){
                    
                },
                getIndex: function(){
                    axios.get("{{url('http://127.0.0.1:8000/api/todolist')}}")
                    .then(response=>{
                        this.data_list = response.data
                    }).catch(err=>{
                        alert("Terjadi kesalahan")
                    });
                }
            }
        });
    </script>

</body>
</html>