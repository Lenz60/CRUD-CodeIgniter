<?= $this->extend('layout/dashboard/template'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div id="content">



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Project</h1>
        </div>

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
                                <option value="all">All Client</option>
                                <?php foreach ($client as $row) : ?>
                                    <option value="<?= $row->client_id; ?>"><?= $row->client_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Status</p>
                            <select name="filterStatus" id="filterStatus" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="">All Status</option>
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
                        <?php foreach ($project as $row) : ?>
                            <tr>
                                <td><input name="selectId" type="checkbox"></td>
                                <td><a href="/edit">edit</a></td>
                                <td><?= $row->project_name; ?></td>
                                <td><?= $row->client_name; ?></td>
                                <td id="dateProjectStart">{{translateMonth(<?= strtotime($row->project_start); ?>)}}</td>
                                <td id="dateProjectStart">{{translateMonth(<?= strtotime($row->project_end); ?>)}}</td>
                                <td><?= $row->project_status; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p>{{message}}</p>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?= $this->endSection('content'); ?>