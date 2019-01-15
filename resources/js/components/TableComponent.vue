<template><div class="panel panel-default">
            <div class="panel-heading">word list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th> word1</th>
                        <th>word2</th>
                        <th>status</th>
                        <th width="150">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="word, index in words">
                        <td>{{ word.id }}</td>
                        <td>{{ word.title }}</td>
                        <td>{{ word.second_title }}</td>
                        <td>{{ word.status }}</td>
                        <td>
                        
                            <a href="#" @click="removeElement(word.id, index)"
                               class="btn btn-xs btn-danger" >
                                Delete
                            </a>
                           
                            <button type="button" @click="showModal=true; setVal(word.id, word.title, word.second_title, word.status)" class="btn btn-xs btn-success">Edit</button>
                            
                        </td>
                    </tr>
                   <modal v-if="showModal" @close="showModal=false">
                    <h3 slot="header">Edit Item</h3>
                        <div slot="body">
                            <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                    required  :value="this.e_id">
                                    
                            Word1: <input type="text" class="form-control" id="e_title" name="title"
                                    required  :value="this.e_title">
                                    
                            Word2: <input type="text" class="form-control" id="e_second_title" name="second_title"
                            required  :value="this.e_second_title">
                            
                            Status: <input type="number" class="form-control" id="e_status" name="status"
                            required  :value="this.e_status">
                        </div>
                        <div slot="footer">
                            <button class="btn btn-default" @click="showModal = false">
                            Cancel
                          </button>
                          
                          <button class="btn btn-info" @click="editItem(); showModal = false">
                            Update
                          </button>
                        </div>
                    </modal>
                    </tbody>
                </table>
                 
            </div>
        </div>
    </div>
    
</template>
<script>
    export default {
        data() {
            return{
                showModal: false,
                word: { 'title': '', 'second_title': '', 'status': ''},
                words: []
            }
        },
        created(){
            axios.get('./api/word')
                .then(response => this.words = response.data);
         Event.$on('taskCreated', (title,second_title) => {
              
                
              this.words.push(title);
              this.words.push(second_title);
         })
        },
        methods:{
            removeElement(id , index){
            
            
             this.words.splice(index, 1);
             axios.delete('./api/word/' + id)
              .then((response) => {
                  console.log(response)
              }, (error) => {
                 console.log('error')
              })
          },
           setVal(val_id, val_title, val_second_title, val_status) {
        this.e_id = val_id;
        this.e_title = val_title;
        this.e_second_title = val_second_title;
        this.e_status = val_status;
        },
        
          editItem: function(){
         var i_val_1 = document.getElementById('e_id');
         var n_val_1 = document.getElementById('e_title');
         var a_val_1 = document.getElementById('e_second_title');
         var p_val_1 = document.getElementById('e_status');

          axios.patch('/api/word/' + i_val_1.value, {val_1: n_val_1.value, val_2: a_val_1.value,val_3: p_val_1.value })
            .then(response => {
              this.getVueItems();
              this.showModal=false;
            });
          this.hasDeleted = true;
            showModal=false;
        }
        }
        
        
    }
</script>
    