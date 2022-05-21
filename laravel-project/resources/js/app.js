require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
			
let app=createApp({}).use(CKEditor)
app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('test-component', require('./components/TestAPIComponent.vue').default);
app.component('editor-component', require('./components/EditorComponent.vue').default);
app.component('md-component', require('./components/MarkdownComponent.vue').default);
app.component('modal-component', require('./components/ModalComponent.vue').default);
app.component('follow-component', require('./components/FollowComponent.vue').default);
app.component('remove-component', require('./components/RemoveComponent.vue').default);
app.component('ckeditor-component', require('./components/CkEditorComponent.vue').default);
app.component('fields-component', require('./components/ModifyFieldsComponent.vue').default);
app.mount("#app");