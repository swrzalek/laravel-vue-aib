<template>
 <div  class="col-sm-3">
      <div class="flip" @mouseover="mouseOver" >
        <div class="card justify-content-center"> 
        <!--<div  class="third">-->
            <button type="button"  @click="removeElement(word.id)" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-primary">Set Level</button>
          <!--</div>-->
          <div class="face front"> 
            <div class="inner">   
              <h3>{{word.id}} - {{word.title}}</h3>
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
    </template>
    <script>
import JQuery from 'jquery'
let $ = JQuery
 export default {
     name: 'card-item',
  props: {
    word: {
      type: Object,
      required: true,}
    },
        data(){
          
          return{
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
        methods:{
          removeElement(context, id){
            alert('Deleted')
             axios.delete('word/' + id)
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