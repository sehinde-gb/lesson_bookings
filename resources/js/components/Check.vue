<template>
  <div id="app" class="container">
    <h2>Additional Lessons</h2>
    <form @submit.prevent="send()">
      <div class="form-group">
        <div class="form-check">
          <label for="add_lessons" class="form-check-label">
            <input type="checkbox"
                    id="add_lessons"
                    class="form-check-input"
                    value=""
                    v-model="add_lessons" />
                    Joe
          </label> 
        </div><!-- /.form-check -->
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
          add_lessons: []
          }
      },
      methods: {
          send() {
              let obj = {
              check_items: this.add_lessons
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
