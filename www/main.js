var app = new Vue({
  el: '#app',
  data: {
    user: {
      name: '',
      username: '',
      password: '',
      confirm_password: ''
    },
    error: ''
  },

  methods: {
    login: function(){
      axios({
        method: 'POST',
        url: '/conection.php',
        data: this.user,
        responseType: 'json'
      }).then(response => {
        if (response.data.error) {
          this.error = response.data.message
        } else {
          window.location.href = '/index.php'
        }
      })
        .catch(console.error)
    },
    register: function(){
      axios({
        method: 'POST',
        url: '/conection-register.php',
        data: this.user,
        responseType: 'json'
      }).then(response => {
        if (response.data.error) {
          this.error = response.data.message
        } else {
          window.location.href = '/login.php'
          this.error = ''
        }
      })
        .catch(console.error)
    }
  }
})
