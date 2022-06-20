<template>

    <div v-if="members !== null">
      <div  v-for="i in [currentIndex]" :key='i' class="carousel-container  d-flex justify-content-between align-items-center">
          <b-container class=" flex-column left d-flex justify-content-center align-items-start">
              <div class="left-container">
                  <h1>Leadership</h1>
                <p class="wp-50">We believe the successful management of macro
investment strategies requires strong leadership
guided by values that not only safeguard the best
interests of our partners, but also empower our
people to deliver exceptional results.</p>
              </div>
          </b-container>
           <div class="img-wrapper">
             <div class="img-container d-flex justify-content-center align-items-center">
                <div class="img-container-inner" :style="getImageUrl()">
                </div>
              </div>
           </div>
          <b-container fluid class="right d-flex justify-content-center align-items-center">
          
            <div class="wp-50">
                <h3>{{ currentSlide.name }}</h3>
              <h6>{{ currentSlide.title }}</h6>
              <p class="p-dark">{{ currentSlide.description }}</p>
              
              <div class="bottom w-25">
                <div  class="d-flex dots justify-content-start align-items-center py-3">
                  <div @click="goToSlide(index)"  :class="[index===currentIndex ? 'active' : '']" class="dot" v-for="(item, index) in members" :key="item">
                  </div>
                </div>
                

                <div  class="d-flex justify-content-between align-items-center">
                    <div v-if="prevText !== ''" @click="prev" class="arrow d-flex align-items-center"><i class="ri-arrow-left-s-line"></i>{{prevText}}</div>
                  <div  v-if="nextText !== ''" @click="next" class="arrow d-flex align-items-center">{{nextText}} <i class="ri-arrow-right-s-line"></i></div>
                </div>

              </div>
            </div>
           </b-container>
    </div>

  </div>
  
</template>

<script>
export default {
  data () {
    return {
      cards: [1, 2, 3, 4, 5, 6, 7, 8],
      members: null,
      innerStyles: {},
      step: '',
      nextText: '',
      prevText: '',
      transitioning: false,
      currentIndex: 0,
    }
  },

  mounted () {
    
     axios
      .get('http://localhost:8000/api/member')
      .then(response => {
        this.members = response.data.data
        console.log(response.data.data, 'response')
        this.setPrevText()
        this.setNextText()
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })

  },
  

  methods: {

    setNextText () {
      if (this.currentIndex !== this.members.length - 1) {
        this.nextText  = this.members[this.currentIndex + 1].name
      }
      else {
        this.nextText = ''
      }

    },

    setPrevText () {
      if( ((-1 * this.currentIndex) !== this.members.length - 1) && (this.currentIndex !== 0)) {
          this.prevText  = this.members[this.currentIndex - 1].name

      }
      else {
        this.prevText = ''
      }
    },

    goToSlide (index) {
      this.currentIndex  = index;
      this.setNextText ()
      this.setPrevText ()
    },

    next () {
      if (this.currentIndex !== this.members.length - 1) {
        this.currentIndex += 1 
        this.setNextText()
        this.setPrevText()
      }

    },

    prev () {

      if( ((-1 * this.currentIndex) !== this.members.length - 1) && (this.currentIndex !== 0)) {
           this.currentIndex -= 1
        this.setNextText()
        this.setPrevText()
      }

    },

    getImageUrl: function () {    
            return 'background-image: url(' + this.members[this.currentIndex].dataImage  + ')';
      }

  },

  computed: {
        currentSlide () {
          return this.members[Math.abs(this.currentIndex) % this.members.length];
        }
    }
  
}
</script>

<style>


</style>