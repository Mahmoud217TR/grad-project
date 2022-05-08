<template>
    <div class="cheat-sheet my-3">
        <div class="row my-3">
            <div class="col-md-4">
                <h1 class="cheat-sheet-head">{{ sheetTitle }}</h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <h2 v-if="!(fields.length > 0)" class="display-6 text-center p-5 text-white">No Fields on this Cheat Sheet Yet.</h2>
                <div class="row mb-4 m-0" v-for="(field,index) in fields">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-5 my-md-0 my-1">
                                <textarea class="form-control text-area-resize-none" :ref="'title-'+field['id']" rows=4 name="title" id="title">{{field['title']}}</textarea>
                            </div>
                            <div class="col-md-5 my-md-0 my-1">
                                <textarea class="form-control text-area-resize-none" :ref="'info-'+field['id']" rows=4 name="info" id="info">{{field['info']}}</textarea>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center my-2 my-md-0">
                                <button @click="remove(field['id'])" class="btn button-primary btn-sm shadow-none me-2">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col d-flex justify-content-md-start justify-content-center">
            <button @click="addNewField" class="btn button-primary btn-sm shadow-none ms-2">Add New Field</button>
            <button @click="update" class="btn button-primary btn-sm shadow-none ms-2">Update</button>
        </div>
    </div>
</template>

<script>
    export default {
        props:['backHref','addField','sheetTitle','sheetId','updateUrl','deleteUrl','getUrl'],
        data() {
            return {
                fields: [],
                showAlert: false,
                ftitle: '',
                removeId: null,
                removeModalShow: false,
            }
        },
        methods: {
            refresh(){
                axios.get(this.getUrl).then(response => {
                    this.fields = response.data;
                    console.log(response.data);
                })
            },
            replaceFillerwithId(string,id){
                return string.replace('filler',id.toString())
            },
            remove(id){
                axios.delete(this.replaceFillerwithId(this.deleteUrl,id)).then(response =>{
                    this.refresh()
                });
            },
            addNewField(){
                axios.post(this.addField).then(this.refresh())
            },
            update(){
                this.fields.forEach(field => {
                    let title = this.$refs['title-'+field['id']][0].value
                    let info = this.$refs['info-'+field['id']][0].value
                    axios.patch(this.replaceFillerwithId(this.updateUrl,field['id']),{title:title,info:info})
                });
                this.refresh()
                this.showAlert = true
                window.location.href = this.backHref;
            }
        },
        mounted() {
            this.refresh()
        },
    }
</script>
