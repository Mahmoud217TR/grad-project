<template>
    <ckeditor :editor="editor" v-model="editorData"  tag-name="textarea" :id='inputId' :name='inputName' :config="editorConfig"></ckeditor>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        props: ['data','input-id','input-name'],
        data() {
            return {
                editor: ClassicEditor,
                editorData: this.data,
                editorConfig: {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', '|',
                            'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', '|',
                            'mediaEmbed', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                }
            }
        },
    }
</script>
