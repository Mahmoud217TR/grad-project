<template>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <div class="row">
							<div class="col-md-3 d-flex align-items-start my-2">
								<h2 class="card-title m-0">Code Editor: </h2>
							</div>
							<div class="col-md-3 d-flex align-items-end justify-content-start my-2">
								<button class="btn btn-success mx-2" @click="run()">Run</button>
								<button class="btn btn-light mx-2">Save</button>
							</div>
							<div class="col-md-6 my-2">
								<div class="row">
									<div class="col-md-6">
										<label class="mb-1" for="theme">Theme:</label>
										<select class="form-select bg-dark text-light" id="theme" @change="switchTheme($event)">
											<option v-for="theme in themes" :value="getThemeUrl(theme)">{{ theme }}</option>
										</select>
									</div>
									<div class="col-md-6">
										<label class="mb-1" for="lang">Language:</label>
										<select class="form-select bg-dark text-light" id="lang" @change="switchLang($event)" >
											<option v-for="(lang,index) in langs" :value="index">{{ lang.key }}</option>
										</select>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="card-body p-0 rounded-bottom">
                        <div id="editor">
                            
                        </div>
						<div class="bg-dark text-light py-2 px-3 rounded-bottom">
							<h3>Output:</h3>
							<p class="output">{{output}}</p>
						</div> 
                    </div>
                </div>   
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        devServer: {
            proxy: 'https://mainsite.com/',
        },
        mounted() {
			this.changeTheme('ace/theme/monokai');
            this.changeLang('ace/mode/python');
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
                    {key: 'Python (3.9.9)',value: 'ace/mode/python', lang:'python3', index: 4},
                    {key: 'Java (JDK 17.0.1)',value: 'ace/mode/java', lang:'java', index: 4},
                    {key: 'C++ (GCC 11.1.0)',value: 'ace/mode/c_cpp', lang:'cpp', index: 5},
                    {key: 'C++14 (GCC 11.1.0)',value: 'ace/mode/c_cpp', lang:'cpp14', index: 4},
                    {key: 'C++17 (GCC 11.1.0)',value: 'ace/mode/c_cpp', lang:'cpp17', index: 1},
                    {key: 'PHP (8.0.13)',value: 'ace/mode/php', lang:'php', index: 4},
                    {key: 'Ruby (3.0.2)',value: 'ace/mode/ruby', lang:'ruby', index: 4},
                    {key: 'C# (mono-6.12.0)',value: 'ace/mode/csharp', lang:'csharp', index: 4},
                    {key: 'Lua (5.4.3)',value: 'ace/mode/lua', lang:'lua', index: 3},
                    {key: 'RUST (1.56.1)',value: 'ace/mode/rust', lang:'rust', index: 4},
                    {key: 'Scala (2.13.6)',value: 'ace/mode/scala', lang:'scala', index: 4},
                    {key: 'COBOL (GNU COBOL 3.1.2)',value: 'ace/mode/cobol', lang:'cobol', index: 3},
                    {key: 'Elixir (1.12.2)',value: 'ace/mode/elixir', lang:'elixir', index: 4},
                    {key: 'Nim (1.4.8)',value: 'ace/mode/nim', lang:'nim', index: 3},
                    {key: 'Dart (2.14.4)',value: 'ace/mode/dart', lang:'dart', index: 4},
                    {key: 'Kotlin (1.6.0 - JRE 17.0.1+12)',value: 'ace/mode/kotlin', lang:'kotlin', index: 3},
                ],
                currLang: {key: 'Python (3.9.9)',value: 'ace/mode/python', lang:'python3', index: 4},
            }
        },
        methods: {
            getThemeUrl(theme){
                return 'ace/theme/'+theme;
            },
            changeTheme(theme){
                var editor = ace.edit("editor");
                editor.setTheme(theme);
            },
            changeLang(lang){
                var editor = ace.edit("editor");
                editor.session.setMode(lang);
            },
            switchTheme(event){
                this.changeTheme(event.target.value);
            },
            switchLang(event){
                this.currLang = this.langs[event.target.value] 
                this.changeLang(this.currLang.value);
            },
            run(){
                var editor = ace.edit("editor");
                var data = {
                    script : editor.getValue(),
                    language: this.currLang.lang,
                    versionIndex: this.currLang.index,
                    clientId: "",
                    clientSecret:""
                }
                
                axios.post('https://api.jdoodle.com/v1/execute', data).then(response =>{
                    this.output = response.data;
                }).catch(error => {
                    this.output = error.response.data.message
                });
            }
        },
    }
</script>

<style scoped>
    #editor { 
		position: relative;
		width: 100%;
		height: 500px;
	}
    .output{
        min-height: 100px;
    }
</style>
