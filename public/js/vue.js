const vue = Vue.createApp({
    data() {
        return {
            message: 'Hello vue'
        }
    }
})

vue.mount('#table')

$(document).ready(function () {
    $('#example').DataTable({
        "lengthChange" : false,
        "searching": false,
        
    })
});