<template>
    <div>
        <label for="sendLesson">
            <input type="checkbox"
                id="sendlesson"
                value="Lessons"
                v-model="checkedOptions"
                @click='toggle = !toggle'>Lessons
        </label>

        <div v-show='toggle'>
            Showing
        
        </div><!-- toggle -->  
    </div>
</template>

<script>
    export default {
        data() { 
            return {
                toggle: false
            }
        } 
    }           
</script>