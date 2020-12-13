
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueStarRating from 'vue-star-rating'

require('./bootstrap');

window.Vue = require('vue');

window.bus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('comment-form', require('./components/CommentForm.vue'));
Vue.component('star-rating', VueStarRating.default);


new Vue({
    el: '#app',
    methods: {
      setRating: function(rating) {
        this.rating = "You have Selected: " + rating + " stars";
      },
      showCurrentRating: function(rating) {
        this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " + rating + " stars"
      },
      setCurrentSelectedRating: function(rating) {
        this.currentSelectedRating = "You have Selected: " + rating + " stars";
      }
    },
    data: {
      rating: "No Rating Selected",
      currentRating: "No Rating",
      currentSelectedRating: "No Current Rating",
      boundRating: 3,
    }
    
  });
