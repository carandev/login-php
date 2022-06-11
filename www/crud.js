let app = new Vue({
  el: '#app',
  data: {
    username: '',
    userId: '',
    users: [],
    error: '',
    show: false
  },

  mounted: function(){
    this.fetchUsers();
  },

  methods: {
    fetchUsers: async function(){
      const response = await axios({
        method: 'GET',
        url: '/crud.php',
      });

      this.users = response.data;
    },
    deleteUser: async function(id){
      const response = await axios({
        method: 'DELETE',
        url: '/crud.php',
        data: {id}
      })

      if (!response.data.error){
        this.fetchUsers();
      }
    },
    editUser: async function(){
      const response = await axios({
        method: 'POST',
        url: '/crud.php',
        data: {id: this.idUser, username: this.username},
        responseType: 'json'
      })


      if (response.data.error){
        console.log(response)
      } else {
        this.show = false;
        this.fetchUsers();
      }
    },

    showModal: function(id){
      this.show = true;
      this.idUser = id;
    },

    generatePdf: function(){
      const doc = new jsPDF();
      let i = 30;
      doc.setFont("helvetica", "bold");
      doc.setFontSize(12);
      doc.text("Usuarios", 100, 10)
      doc.text("Username               Password", 1, 20)

      doc.setFont("helvetica", "normal");
      this.users.forEach(user => {
        doc.text(`${user.username}                   ${user.password}`, 1, i);
        i += 10;
      })

      doc.save("a4.pdf");
    },
    
    generateXls: function(){
      let headers = [
          { label: 'ID', field: 'id' },
          { label: 'Username', field: 'username' },
          { label: 'Password', field: 'password' },
      ];

      content = toExcel.exportXLS( headers, this.users, 'users' );

    }
  }
})
