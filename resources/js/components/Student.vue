<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Component</div>
                        <p v-show="isNinja">Invisible like a ninja!</p>
                        <p v-show="!isNinja">Here I am!</p>
    
                        <button v-on:click="isNinja = !isNinja">Toggle Ninja Skills</button>
                        <h5>Student: {{ student.first_name }}</h5>
                        <div class="card-body">
                            Body of component
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
            isNinja: true
            }
        },
        props: [
          'student'
        ],
        mounted() {
            console.log(this.student);
        }
    }
</script>