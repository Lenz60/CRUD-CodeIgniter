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
        return{
            'project_id' : "",

        }
    },
    methods:{
        create(e){
            // console.log('hello')
            document.getElementById("createForm").submit();
        },
        translateMonth(date){
            const date2 = new Date(date*1000)
            const month = ["Jan","Feb","Mar", "Apr","Mei", "Jun","Jul", "Agu","Sep","Oct","Nov","Dec"]
            const dateFinal = date2.getDate() + ' ' + month[date2.getMonth()] + ' ' + date2.getFullYear()
            return dateFinal
        },
        deleteCheck(e){
            $('.deleteBatch').submit(function(e){
                e.preventDefault();

                let dataCount = $('.selectId:checked');
                if(dataCount.length == 0){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Please select at least one project',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#2563eb',
                    })
                }else{
                    Swal.fire({
                            title: 'Are you sure you want to delete this project?',
                            text: dataCount.length + ' project will be deleted',
                            reverseButtons: true,
                            showCancelButton: true,
                            denyButtonText: `No`,
                            denyButtonColor: '#64748B',
                            confirmButtonText: 'Yes',
                            confirmButtonColor: '#2563eb',
                          }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "post",
                                    url: '/delete',
                                    dataType: 'json',
                                    data: $(this).serialize(),
                                    success:function(response){
                                        if (response.status){
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Project deleted successfully',
                                                confirmButtonText: 'Ok',
                                                confirmButtonColor: '#2563eb',
                                            })
                                            window.location.replace('/project')
                                            
                                        }else{
                                            Swal.fire('Changes are not saved', '', 'info')
                                        }
                                    }

                                })
                            } else if (result.isDenied) {
                              Swal.fire('Changes are not saved', '', 'info')
                            }
                          })
                }
                return false;
            })
        },
    }
})



filter.mount('#filter')
crud.mount('#crud')
vue.mount('#table')

$(document).ready(function(){
                $(document).on('click', '.editData', function(){
                    // console.log('hello')
                    var id=$(this).val();
                    var projectName=$('#projectName'+id).text();
                    var clientId=$('#clientId'+id).text();
                    var clientName=$('#clientName'+id).text();
                    var dateProjectStart=$('#datePStart'+id).text();
                    var dateProjectEnd=$('#datePEnd'+id).text();
                    var projectStatus=$('#projectStatus'+id).text();
                    console.log(id);

                    
             
                    $('#editModal').modal('show');
                    $('#editProjectId').text(id);
                    $('#editProjectId').val(id);
                    $('#editProjectName').val(projectName);
                    $('#editProjectClient').val(clientId);
                    $('#editProjectStart').val(dateProjectStart);
                    $('#editProjectEnd').val(dateProjectEnd);
                    $('#editProjectStatus').val(projectStatus);
                });
            });


// var $checkboxes = $('.checkbox-item');
// $('.checkbox-item').change(function(){
//     var checkboxesLength = $checkboxes.length;
//     var checkedCheckboxesLength = $checkboxes.filter(':checked').length;
//     if(checkboxesLength == checkedCheckboxesLength) {
//         $('#selectAll').prop('checked', true);
//     }else{
//         $('#selectAll').prop('checked', false);
//     }
// });


$(document).ready(function () {
    $('#example').DataTable({
        "lengthChange" : false,
        "pageLength": 5,
        "searching": false,
        "ordering": false,
        "pagingType": 'full_numbers',
        "sPaginationType": 'extStyle'
        
    }),
    $('#selectAll').click(function (e) {
        if($(this).is(":checked")) {
            $('.selectId').prop('checked', true);
        }else{
            $('.selectId').prop('checked', false);
        }
    });
    
});