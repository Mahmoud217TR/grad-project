require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue';
			
let app=createApp({})
app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('test-component', require('./components/TestAPIComponent.vue').default);
app.component('editor-component', require('./components/EditorComponent.vue').default);
app.component('md-component', require('./components/MarkdownComponent.vue').default);
app.mount("#app");