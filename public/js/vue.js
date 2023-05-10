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
        "pageLength": 5,
        "searching": false,
        "pagingType": 'full_numbers',
        
    })
});