<template>
  <div id="app" class="container">
    <h2>Subjects</h2>
    <form @submit.prevent="send()">
      <div class="form-group">
        <div class="form-check">
          <label for="law" class="form-check-label">
            <input type="checkbox"
                    id="law"
                    class="form-check-input"
                    value="law"
                    v-model="checkedSubjects" />
                    Law
          </label> 
        </div><!-- /.form-check -->
        <div class="form-check">
          <label for="chemistry" class="form-check-label">
            <input type="checkbox"
                    id="chemistry"
                    class="form-check-input"
                    value="chemistry"
                    v-model="checkedSubjects" />
                    Chemistry 
          </label>
        </div>

        <div class="form-check">
          <label for="Woodwork" class="form-check-label">
            <input type="checkbox"
                   id="woodwork"
                   class="form-check-input"
                   value="woodwork"
                   v-model="checkedSubjects" />
                   Woodwork
          </label> 
        </div>
       </div><!-- /.form-group -->
        
      <div class="form-group">
          <button class="btn btn-info">Submit</button>
      </div><!-- /.form-group -->
    </form>       
  </div><!-- /#app -->
</template>


<script>
    export default {
    
      data() {
          return {
          checkedSubjects: []
          }
      },
      methods: {
          send() {
            //console.log(this.checkedSubjects.toString());
              let obj = {
              check_items: this.checkedSubjects
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
