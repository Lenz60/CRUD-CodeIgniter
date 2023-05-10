<?= $this->extend('layout/dashboard/template'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $name ?></span>
                    <img class="img-profile rounded-circle" src="/assets/img/avatar/<?= $image ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Project</h1>
        </div>

        <p class="text-green-500">Test</p>

        <div>

            <div class="w-full border-2 border-gray-600 justify-center items-center">
                <form action="/filter" method="POST">
                    <div class="grid grid-cols-5 m-2 gap-x-2 w-auto">
                        <div class="cols-span-2 flex items-center justify-center">Filter</div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Project Name</p>
                            <input type="text" name="filterProjectName" class="border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full">
                        </div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Client</p>
                            <select name="filterClient" id="filterClient" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full">
                                <option value="Client1">Client1</option>
                                <option value="Client1">Client1</option>
                                <option value="Client1">Client1</option>
                                <option value="Client1">Client1</option>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Status</p>
                            <select name="filterStatus" id="filterStatus" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="All Status">All Status</option>
                                <option value="OPEN">OPEN</option>
                                <option value="DOING">DOING</option>
                                <option value="DONE">DONE</option>
                            </select>
                        </div>
                        <div class="grid grid-row-1">
                            <div class="grid grid-cols-2 pb-1 justify-end items-end">
                                <div class="flex justify-center">
                                    <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">Search</button>
                                </div>
                                <div class="flex justify-center">
                                    <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-fit">
                <div class="grid grid-cols-2 gap-x-1 m-3">
                    <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">New</button>
                    <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">Delete</button>
                </div>
            </div>
            <div id='table'>
                <table id="example" class="table-auto border-2 border-gray-400 cell-border">
                    <thead class="bg-gray-400">
                        <tr class="text-black">
                            <th>
                                <input name="selectAll " type="checkbox">
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
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>The Eagles</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>The Eagles</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox">)</td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>The Eagles</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                            <td>1961</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>The Eagles</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                            <td>1972</td>
                        </tr>
                        <tr>
                            <td><input name="selectId" type="checkbox"></td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                            <td>1975</td>
                        </tr>
                    </tbody>
                </table>
                <p>{{message}}</p>
            </div>

        </div>

        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->



    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection('content'); ?>