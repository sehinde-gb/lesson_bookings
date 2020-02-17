<template>
  <div>

     <button @click="modalAction()" class="mt-4 bg-teal-500 text-green font-bold px-4 py-2 rounded-full">View Modal</button>
      <transition name="fade"><
        <div v-if="modal" class="bg-grey absolute pin-t pin-1 h-screen w-full flex items-center justify-center">
          <div class="bg-white p-4 rounded w-1/3">
              <h2 class="mb-2">Hello</h2>
              <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              <button @click="modalAction()" class="mt-4 bg-teal-500 text-green font-bold px-4 mt-4 py-2 rounded-full">Close</button>
          </div>
      </div>
     </transition> 
    
  </div>
</template>

<script>
   export default {
        data: function() {
            return {
              modal: false
            }
        },
        methods: {
          modalAction() {
            

            if (this.modal == false) {
                this.modal = true;
            } else {
              this.modal = false
            }
          }
        }
   }  
</script>

<style>
 
</style>