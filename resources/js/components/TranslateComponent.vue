<template>
  <div class="col-md-6">
  <div class="card bg-light mb-3 mt-4" id="app">
    <div class="card-header">Word translate</div>
    <div class="card-body">
    <hr>
    <TranslateForm v-on:formSubmit="translateText"></TranslateForm>
    <div class="card-footer py-4">
    <TranslateOutput v-text="translatedText"></TranslateOutput>
    </div>
    </div>
  </div>
  </div>
</template>

<script>
import TranslateForm from './TranslateForm'
import TranslateOutput from './TranslateOutput';

export default {
  name: 'app',
  components:{
    TranslateForm,
    TranslateOutput
  },
  data: function(){
    return {
      translatedText:''
    }
  },
  methods: {
    translateText:function(text, language){
      console.log(text)
      console.log(language)
      this.$http.get('https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20190107T004936Z.171f36a7744405ff.6fe970fb602173813436a639e2461588e329efd6&lang=pl-'+language+'&text='+text)
      .then((response) => {
        this.translatedText = response.body.text[0];
      });
    }
  }
}
</script>