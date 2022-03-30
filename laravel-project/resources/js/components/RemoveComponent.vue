<template>
    <button class="btn button-primary TB mx-2" @click="showModal">{{ text }}</button>
    <modal-component :title="title" :msg="msg" :show="show" @close="hideModal" @confirm="remove"></modal-component>
</template>

<script>
import axios from 'axios'
    export default {
        props:['text','action','title','msg'],
        data() {
            return {
                show: false
            }
        },
        methods: {
            showModal(){
                this.show = true
            },
            hideModal(){
                this.show = false
            },
            remove(){
                axios.delete(this.action).then(response =>{
                    window.open(response.data,"_self")
                })
            }
        },
    }
</script>
