<!-- Custom fonts for this template-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Tailwindcss -->
<link rel="stylesheet" href="/css/app.css">


<!-- datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->

<li style="font-style:bold" title="rate on skill" class="skill_rating"><a data-toggle="modal" title="Add this item" class="open-AddBookDialog" href="#addBookDialog" data-id='5'><i class="fa fa-anchor" aria-hidden="true"></i> Click me</a></li>

<!-- Modal -->

<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="addBookDialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Search</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="bookId" id="bookId" value="" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"><span>Search</span></button>
            </div>
        </div>
    </div>

    <script>
        $('body').on('click', '.open-AddBookDialog', function() {
            var myBookId = $(this).data('id');
            $("#addBookDialog #bookId").val(myBookId);
            alert(myBookId);
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/jquery/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- vuejs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://www.unpkg.com/usemodal-vue3"></script>
    <script src="/js/vue.js"></script>

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/pagination/extjs.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>
    <!-- End of Main Content -->
    <?php
// date_default_timezone_set("Asia/Jakarta");
// setlocale(LC_TIME, 'id_ID');
// $date = date('Y-m-d');
// echo $date;
// print_r(date("d-M-Y", strtotime($date)));


// function convertDate($date)
// {
//     $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', '']
//     $separate = explode("-", $date);

// }

// $formatter = IntlDateFormatter::create(
//     'id_ID',
//     IntlDateFormatter::FULL,
//     IntlDateFormatter::FULL,
//     'Asia/Jakarta',
//     IntlDateFormatter::GREGORIAN
// );

// echo (date("d-M-Y", strtotime($formatter)));
// $newDate = date("d-M-Y", strtotime($date));

// echo strftime("%A, %e %B %Y", $newDate);

// echo time();
// print_r(date("d-M-Y", strtotime($date)));


// $fmt = datefmt_create(
//     'id_ID',
//     IntlDateFormatter::FULL,
//     'Asia/Jakarta',
//     IntlDateFormatter::GREGORIAN,
//     'MM/dd/yyyy'
// );
// echo 'First Formatted output is ' . datefmt_format($fmt, 0);



// SELECT Project.project_name, Client.client_name, Project.project_start, Project.project_end, Project.project_status FROM tb_m_project as Project JOIN tb_m_client as Client ON Project.client_id = Client.client_id;
