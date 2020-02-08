
<template>
  <div id="app" class="container">
    <h2>Vue Multiple Checkbox Example</h2>
    <form @submit.prevent="send()">
      <div class="form-group">
        <div class="form-check">
            <input type="checkbox" id="checkbox" v-model="checked">
              <label for="checkbox">{{ checked }}</label>
        </div>

      <br>
    </div> 

    <div class="form-group">
      <button class="btn btn-info">Submit</button>

    </div>
    </form>       

    
  </div>
</template>

<script>


export default {
 

  data() {
    return {
      checkbox: []
    }
  },
  methods: {
      send() {
        

        let obj = {
          check_items: this.checkbox
        }
        axios.post('/api/checks', obj)
            .then(res => console.log(res.data));
      }
    }

}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
