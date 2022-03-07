<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" @click="test()">Hit!!!</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>Response:</h4>
                <p>{{msg}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Testing form mounted.')
            console.log(this.tags.split(","))
            console.log(this.action)
        },
        props:['uri','action','tags'],
        data() {
            return {
                msg: ''
            }
        },
        methods: {
            test(){
                axios.post(this.uri,{action:this.action,tids:this.tags.split(",")}).then(response =>{
                    this.msg = response.data;
                }).catch(error => {
                    this.msg = error.response.data.message
                });
            }
        },
    }
</script>
