<template>
    <!-- the bigger div content all element of editor  -->
    <div class="container ide text-white px-2">
        <!-- the header of it contain label and  selector  -->
        <div  class="row header bg-header p-2">
            <!-- this for label  -->
            <div class="col ml-2 text-center text-lg-start my-3">
                <h2 class="m-0">Code Editor</h2>
            </div>
            <!-- this for selector1  -->
            <div class="col-lg my-2 my-lg-0 text-center text-lg-start">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <label for ="language" class="me-2" >Language:</label>
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-start">
                        <select id ="language" name="language" class="form-select d-inline" aria-label="Default select example" @change="switchLang($event)">
                            <option v-for="(lang,index) in langs" :value="index">{{ lang.key }}</option>
                          </select>
                    </div>
                </div>
            </div>
            <!-- this for selector2  -->
            <div class="col-lg my-2 my-lg-0 text-center text-lg-start">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <label for ="theme" class="me-2" >Theme:</label>
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-start">
                        <select id ="theme" name="theme" class="form-select d-inline" aria-label="Default select example" @change="switchTheme($event)">
                            <option v-for="theme in themes" :value="getThemeUrl(theme)">{{ theme }}</option>
                          </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- the secound part is for code text  and output  -->
        <div  class="row" >
            <!-- this for code  -->
            <div class="col-md-8 p-0">
                <!-- this is for code   -->
                <div class="code-editor" name="editor" id="editor" @keypress="checkButtons()">
                    {{ content }}
                </div>
            </div>
             <!-- this for out   -->
             <div class="col-md-4">
                 <!-- this for output label   -->
                 <div class="row bg-header">
                   <div class="col mb-2 d-flex justify-content-center">
                    <h2>Output</h2>
                   </div>
                 </div>
                 <!-- this for output   -->
                 <div class="row bg-output ">
                    <div class="col">
                        <p class="output text-break py-2 text-dark">
                            {{output}}
                        </p>
                    </div>
                  </div>
                   <!-- this for button   -->
                  <div class="row  bg-header py-2">
                  <!-- this for button run  -->
                    <div class="col p-1">
                        <button class="btn button-primary TB d-flex align-items-center" @click="run()">
                            <i class="bi bi-play-btn-fill icons pe-2"></i>
                            <span>Run</span>
                        </button>
                    </div>
                     <!-- this for button save  -->
                     <div class="col p-1">
                        <button class="btn button-primary TB d-flex align-items-center" @click="saveFile()">
                            <i class="bi bi-save2-fill icons pe-2 mb-0"></i>
                            <span>Save</span>
                        </button>
                     </div>
                     <!-- this for button undo  -->
                     <div class="col p-1">
                        <button id ='undo' class="btn button-primary TB d-flex align-items-center" @click="undo()">
                            <i class="bi bi-arrow-counterclockwise icons pe-1"></i>
                            <span>Undo</span>
                        </button>
                     </div>
                     <!-- this for button redo   -->
                     <div class="col p-1">
                        <button id = 'redo' class="btn button-primary TB d-flex align-items-center" @click="redo()">
                            <i class="bi bi-arrow-clockwise icons pe-1"></i>
                            <span>Redo</span>
                        </button>
                     </div>
                  </div>
                    
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['uri','content'],
        mounted() {
            this.editor = ace.edit("editor");
			this.changeTheme('ace/theme/monokai');
            this.changeLang('ace/mode/python');
            this.currLang = this.langs[0];
            this.editor.session.mergeUndoDeltas = true;
            this.editor.session.markUndoGroup();
            this.checkButtons()
        },
        data() {
            return {
                output: '',
                themes: [
                    'monokai',
                    'ambiance',
                    'chaos',
                    'chrome',
                    'clouds',
                    'cobalt',
                    'dawn',
                    'dracula',
                    'dreamweaver',
                    'eclipse',
                    'github',
                    'gob',
                    'gruvbox'
                ],
                langs: [
                    {key: 'Python (3.9.9)',value: 'ace/mode/python', lang:'python3', index: 4, ext:'py'},
                    {key: 'Java (JDK 17.0.1)',value: 'ace/mode/java', lang:'java', index: 4, ext:'java'},
                    {key: 'C++ (GCC 11.1.0)',value: 'ace/mode/c_cpp', lang:'cpp', index: 5, ext:'cpp'},
                    {key: 'C++14 (GCC 11.1.0)',value: 'ace/mode/c_cpp', lang:'cpp14', index: 4, ext:'cpp'},
                    {key: 'C++17 (GCC 11.1.0)',value: 'ace/mode/c_cpp', lang:'cpp17', index: 1, ext:'cpp'},
                    {key: 'PHP (8.0.13)',value: 'ace/mode/php', lang:'php', index: 4, ext:'php'},
                    {key: 'Ruby (3.0.2)',value: 'ace/mode/ruby', lang:'ruby', index: 4, ext:'rb'},
                    {key: 'C# (mono-6.12.0)',value: 'ace/mode/csharp', lang:'csharp', index: 4, ext:'cs'},
                    {key: 'Lua (5.4.3)',value: 'ace/mode/lua', lang:'lua', index: 3, ext:'lua'},
                    {key: 'RUST (1.56.1)',value: 'ace/mode/rust', lang:'rust', index: 4, ext:'rs'},
                    {key: 'Scala (2.13.6)',value: 'ace/mode/scala', lang:'scala', index: 4, ext:''},
                    {key: 'COBOL (GNU COBOL 3.1.2)',value: 'ace/mode/cobol', lang:'cobol', index: 3, ext:'sc'},
                    {key: 'Elixir (1.12.2)',value: 'ace/mode/elixir', lang:'elixir', index: 4, ext:'exs'},
                    {key: 'Nim (1.4.8)',value: 'ace/mode/nim', lang:'nim', index: 3, ext:'nim'},
                    {key: 'Dart (2.14.4)',value: 'ace/mode/dart', lang:'dart', index: 4, ext:'dart'},
                    {key: 'Kotlin (1.6.0 - JRE 17.0.1+12)',value: 'ace/mode/kotlin', lang:'kotlin', index: 3, ext:'kt'},
                ],
                currLang: null,
                editor: null,
            }
        },
        methods: {
            getThemeUrl(theme){
                return 'ace/theme/'+theme;
            },
            changeTheme(theme){
                this.editor.setTheme(theme);
            },
            changeLang(lang){
                this.editor.session.setMode(lang);
            },
            switchTheme(event){
                this.changeTheme(event.target.value);
            },
            switchLang(event){
                this.currLang = this.langs[event.target.value] 
                this.changeLang(this.currLang.value);
            },
            run(){
                var data = {
                    script : this.editor.getValue(),
                    language: this.currLang.lang,
                    index: this.currLang.index,
                }
                
                axios.post(this.uri, data).then(response =>{
                    this.output = response.data["output"];
                }).catch(error => {
                    this.output = error.response.data.message
                });
            },
            saveFile(){
                var blob = new Blob([this.editor.getValue()],{type:'text/plain'})
                var anchor = document.createElement('a')
                anchor.download = 'test.'+this.currLang.ext
                anchor.href = window.URL.createObjectURL(blob)
                anchor.click()
            },
            checkButtons(){
                if (!this.editor.session.getUndoManager().hasUndo()){
                    this.disableButton('undo')
                }else{
                    this.enableButton('undo')
                }

                if (!this.editor.session.getUndoManager().hasRedo()){
                    this.disableButton('redo')
                }else{
                    this.enableButton('redo')
                }
            },
            undo(){
                this.editor.undo()
                this.checkButtons()
            },
            redo(){
                this.editor.redo()
                this.checkButtons()
            },
            disableButton(id){
                var button = document.getElementById(id);
                button.disabled = true
                button.classList.add('btn-secondary')
            },
            enableButton(id){
                var button = document.getElementById(id);
                button.disabled = false
                button.classList.remove('btn-secondary')
            }
        },
    }
</script>
