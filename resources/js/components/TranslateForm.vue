<template>

    <div id="translateForm">
    <div class="col-md-12 col-md-offset-3 mb-4">
      <form id="transForm" class="form-inline well" v-on:submit="formSubmit">
        <input class="form-control mr-2" type="text" v-model="textToTranslate" placeholder="Enter a Word...">
        <select class="form-control mr-2" v-model="language">
          <option value="ru">Russian</option>
          <option value="es">Spanish</option>
          <option value="fr">French</option>
          <option value="zh">Chinese</option>
        </select>
        <input class="btn btn-primary" type="submit" value="Translate">
      </form>
    </div>
  </div>

</template>
<script>
   export default {
  name: 'translateForm',
  data(){
    return {
      textToTranslate:'',
      language:''
    }
  },
  created() {
    this.language = 'ru';
  },
  methods: {
    formSubmit(e){
      
      this.$emit('formSubmit', this.textToTranslate, this.language);
      e.preventDefault();
    }
  }
}
</script>
