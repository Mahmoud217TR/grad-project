<template>
    <button v-show="!hidden" class="btn button-primary TB mx-2" @click="showModal" :id='buttonId'>{{ text }}</button>
    <modal-component :title="title" :msg="msg" :show="show" @close="hideModal" @confirm="remove"></modal-component>
</template>

<script>
import axios from 'axios'
    export default {
        props:['text','action','title','msg','hidden','buttonId'],
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
