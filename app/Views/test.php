<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
    <div id="crud">
        <button @click=editData()>aaa</button>
        <table id="example">
            <thead class="bg-gray-400">
                <tr class="text-black">
                    <th>
                        <input id="selectAll" name="selectAll " type="checkbox">
                    </th>
                    <th>Action</th>
                    <th>Project Name</th>
                    <th>Client</th>
                    <th>Project Start</th>
                    <th>Project End</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-black">
                <tr>
                    <td><input class="selectId" name="selectId[]" value="1" type="checkbox"></td>
                    <td class="flex items-center justify-center"><button is="edit" @click="editData" value="editData1" name="editData" value="echoo" type="button" class="rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">edit</button></td>
                    <td><span id="projectName" name="projectName">Project Name </span></td>
                    <td><span id="clientName" name="clientName">Client 1</span></td>
                    <td id="dateProjectStart"><span id="dateProjectStart" name="dateProjectStart">2022/09/20</span></td>
                    <td id="dateProjectEnd"><span id="dateProjectEnd" name="dateProjectEnd">2022/09/20</span></td>
                    <td><span id="projectStatus" name="projectStatus">ongoing</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- End of Main Content -->

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


</body>

</html>