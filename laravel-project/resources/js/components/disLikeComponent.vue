<template>
    <a type="button" :class="[heart]" v-on:click="dislike"></a>

</template>

<script>

    export default {
        
        data() {
            return {
             heart:'bi bi-hand-thumbs-down unstyled-anchor1',
             
            }
        },
        methods: {
            dislike(){
                  this.heart='bi bi-hand-thumbs-down-fill unstyled-anchor2 orange-text';
                 }
            
        }
    }
</script>
