<template>
    <button class="btn button-primary TB p-2 text-capitalize" @click='toggleFollow()'>{{buttontext}}</button>
</template>

<script>
    export default {
        props:['uriStatus', 'uriToggle', 'type', 'id'],
        data() {
            return {
                status: 'not following',
            }
        },
        methods: {
            getStatus(){
                axios.post(this.uriStatus,{type:this.type, object_id:this.id}).then(response => {
                    this.status = response.data
                    console.log(this.status)
                });
            },
            toggleFollow(){
                axios.post(this.uriToggle,{type:this.type, object_id:this.id, process:this.buttontext}).then(response => {
                    this.getStatus()
                });
            }
        },
        mounted() {
            this.getStatus()
        },
        computed: {
            buttontext: function(){
                console.log('triggered')
                if(this.status == 'following'){
                    return 'unfollow'
                }else if(this.status == 'not following'){
                    return 'follow'
                }
            }
        },
    }
</script>
