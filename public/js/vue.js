const vue = Vue.createApp({
    data() {
        return {
            message: 'Hello vue',
        }
    },
    methods :{
        translateMonth(date){
            const date2 = new Date(date*1000)
            const month = ["Jan","Feb","Mar", "Apr","Mei", "Jun","Jul", "Agu","Sep","Oct","Nov","Dec"]
            const dateFinal = date2.getDate() + ' ' + month[date2.getMonth()] + ' ' + date2.getFullYear()
            return dateFinal
        },
    }
})

const filter = Vue.createApp({
    data(){

    },
    methods:{
        resetButton(e){
            window.location.replace('/project')
        }
    }
})

const crud = Vue.createApp({
    data(){

    },
    methods:{
        create(e){
            // console.log('hello')
            document.getElementById("createForm").submit();
        }
    }
})


filter.mount('#filter')
crud.mount('#createModal')
vue.mount('#table')

$(document).ready(function () {
    $('#example').DataTable({
        "lengthChange" : false,
        "pageLength": 5,
        "searching": false,
        "pagingType": 'full_numbers',
        "sPaginationType": 'extStyle'
        
    })
});