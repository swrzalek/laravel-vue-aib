

<template>
<div class="container-fluid">
<div class="row">
    
    <div v-for="(word, index) in words" :key="word.id" class="col-sm-3">
      <div class="flip" @mouseover="mouseOver" >
        <div class="card justify-content-center"> 
        <button style="width:30px; height:30px; margin-left:10px;" @click='toggle = !toggle' type="button"></button>
        <div  v-show='toggle' class="third">
            <button type="button"  @click="removeElement(word.id, index)" class="btn btn-danger">Delete {{word.id}}</word></button>
            <button type="button" @click="editWord" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-primary">Set Level</button>
            
          </div>
          <div v-if="!word.edditing" class="edit">
             <input  type="text" v-model="word.title"  @keyup.enter="doneEdit" @keyup.esc="cancelEdit" v-focus>
              <input type="text" v-model="word.second_title"  @keyup.enter="doneEdit" @keyup.esc="cancelEdit" v-focus>
              
            

          </div>
          <div class="face front"> 
            <div class="inner">   
              <h3>{{word.title}}</h3>
            </div>
          </div> 
          <div class="face back"> 
            <div class="inner"> 
              <h3>{{word.second_title}}</h3>
            </div>
          </div>
          
        </div>	 
      </div>
    </div>
    </div>
  </div>
  
</template>

<script>
import JQuery from 'jquery'
let $ = JQuery
 export default {
        data(){
         
          return{
            toggle: false,
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
        mounted() {
            console.log('Component mounted.')
        },
        directives: {
          focus: {
            inserted: function(el) {
              el.focus()
            }
          }
        },
        methods:{
          editWord(){
          
                $(".edit").toggle();
                $(".inner").toggle();
              
          },
          doneEdit(){
           
            axios.patch('/api/word/' + word.id, { title:this.title, second_title:this.second_title })
                .then((respone) => {
                  console.log('Updated')
                })
          },
          
          removeElement(id , index){
            
            alert('Deleted')
             this.words.splice(index, 1);
             axios.delete('./api/word/' + id)
              .then((response) => {
                  console.log(response)
              }, (error) => {
                 console.log('error')
              })
          },
            editonDbclick(){
             
              alert('alert')
              $(this).find('.third').css({  visibility: "hidden" });
            },
            mouseOver(){
             
             $(this).find('.card').toggleClass('flipped');
         
      
         
            }
        }
    }
</script>

