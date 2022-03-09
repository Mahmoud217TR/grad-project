<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="markdown-body" v-html="text"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {micromark} from 'micromark'
    import {gfm, gfmHtml} from 'micromark-extension-gfm'
    import {gfmFootnote, gfmFootnoteHtml} from 'micromark-extension-gfm-footnote'
    import {directive, directiveHtml} from 'micromark-extension-directive'
    import {gfmAutolinkLiteral,gfmAutolinkLiteralHtml} from 'micromark-extension-gfm-autolink-literal'
    export default {
        props:['content'],
        data() {
            return {
                text: '',
            }
        },
        methods: {
            transform(markdown){
                return micromark(markdown, {
                            allowDangerousHtml: true,
                            extensions: [gfm(),gfmFootnote(),directive(),gfmAutolinkLiteral],
                            htmlExtensions: [gfmHtml(),gfmFootnoteHtml(),directiveHtml(),gfmAutolinkLiteralHtml]
                        })
            }
        },
        mounted() {
            console.log(typeof(this.content))
            console.log(this.content)
            console.log(micromark(this.content))
            this.text = this.transform(this.content)
        },
    }
</script>

<style scoped>
.markdown-body {
		box-sizing: border-box;
		min-width: 200px;
		max-width: 980px;
		margin: 0 auto;
		padding: 45px;
	}

	@media (max-width: 767px) {
		.markdown-body {
			padding: 15px;
		}
	}
</style>