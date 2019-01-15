<template>
<div class="col-md-6" >
    <div class="card bg-light mt-4">
            <div class="card-header">Task Form</div>

            <div class="card-body">
                <form action="./api/word" method="post" @submit.prevent="addTask()">
                    
                    <div class="form-group">
                        <input type="text" name="title" v-model="title" placeholder="Local word" class="form-control">
                    </div>
                     <div class="form-group">
                        <input type="text" name="second_title" v-model="second_title" placeholder="Foreign word" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Task" class="btn btn-info">
                    </div>
                </form>
            </div>
       
    </div>
</div>
</template>
<script>
    import { EventBus } from '../event-bus.js';
    export default {
        data(){
            return{
                title:'',
                second_title:''
            }
            
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            
            addTask() {
                Event.$emit('taskCreated',{title:this.title, second_title:this.second_title});
                axios.post('./api/word', {
                    title:this.title,
                    second_title:this.second_title,
                    
                     })
                     this.title = '';
                     this.second_title = '';
                     
                     
                 }
    
    
 
        }
    }
</script>