<template>
  <div class="back-drop" @click.self="close" v-if="show">
    <div class="my-modal">
      <div class="card registration-box">
        <div class="x-button" @click="close"></div>
        <div class="card-header">
            <div class="border-bottom border-2">
              <h2 class="text-start pb-2 head-line">{{ title }}</h2>
            </div>
        </div>

        <div class="card-body">
          <p class="base-line text-start">{{ msg }}</p>
          <div class="row row-cols-auto mb-0 justify-content-center">
            <div>
                <button type="submit" class="btn button-primary TB" @click="buttonClicked('confirm')">Confirm</button>
            </div>
            <div>
                <button type="submit" class="btn button-secondary TB" @click="close">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Modal',
  props: ['title','msg','show'],
  data() {
    return {
      buttonsArray: [],
    }
  },
  methods: {
    close(){
      this.$emit('close')
    },
    buttonClicked(buttonText){
      this.$emit(buttonText)
      this.close()
    }
  },
}
</script>

<style scoped>
  .back-drop{
    z-index: 100;
    background: rgba(0, 0, 0, 0.5);
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    overflow: scroll;
  }

  .back-drop::-webkit-scrollbar {
    display: none;
  }

  .my-modal{
    position: relative;
    text-align: center;
    width: max(50%,15rem);
    padding: 2rem 2rem;
    margin: 5rem auto;
    border-radius: .25rem;
    z-index: 101;
  }

  .x-button::after{
    content: "\00d7";
    font-size: 2rem;
    position: absolute;
    top: 0;
    right: 1rem;
    cursor: pointer;
  }
  
</style>
