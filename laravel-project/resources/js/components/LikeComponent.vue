<template>
    <a type="button" :class="[heart]" v-on:click="like"></a>

</template>

<script>

    export default {
        
        data() {
            return {
             heart:'bi bi-heart unstyled-anchor1',
             
            }
        },
        methods: {
            like(){
                  this.heart='bi bi-heart-fill unstyled-anchor2 orange-text';
                 }
            
        }
    }
</script>
