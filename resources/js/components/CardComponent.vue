

<template>
  
<div class="container-fluid mt-4">
<div class="row">
    
    <div v-for="(word , index) in words" :key="word.id" class="col-sm-2">
      <div class="flip" @mouseover="mouseOver" >
        <div class="flashcard card justify-content-center"> 
             <div class="face front"> 
            <div class="inner">   
              <h3>{{word.title}}</h3>
              
            </div>
          </div> 
          <div class="face back"> 
            <div class="inner"> 
              <h3>{{word.second_title}}</h3>
              <button type="button" @click="changeColor(this.word.splice)" class="btn btn-success">I remember</button>
            </div>
          </div>
          
        </div>	 
      </div>
    </div>
    </div>
  </div>
  
</template>

<script>
import { EventBus } from '../event-bus.js';
import JQuery from 'jquery'
let $ = JQuery
 export default {
        data(){
         
          return{
            word: { 'title': '', 'second_title': '' , 'status': ''},
            toggle: false,
            words: []
          }
        },
         created(){
         
          axios.get('./api/word')
                .then(response => this.words = response.data);
          
        Event.$on('taskCreated', (title,second_title) => {
                console.log(title,second_title);
              this.words.push(title);
              this.words.push(second_title);
              // axios.get('./api/word')
              //   .then(response => this.words = response.data);
          });
          

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
          doneEdit(id){
            var input = this.word;
            
            console.log(input)
            axios.patch('/api/word/' + id, input)
                .then((response) => {
                  this.word = {'title':'' , 'second_title':'' , 'id':'', 'status':'' };
                  console.log("Success edit");
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
             
            $('.card').click(function(){
            $(this).toggleClass('flipped');
            // $(this).find('.card').toggleClass('flipped');
            })
            
          },
          
          changeColor(index){
           this.words.splice(index, 1);
          }
         }
 }
</script>

