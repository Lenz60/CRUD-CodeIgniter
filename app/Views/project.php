<?= $this->extend('layout/dashboard/template'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div id="content">



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="grid grid-cols-2 border-2 border-green-600">
            <div class="cols-span-3 flex w-fit">
                <h1 class="h3 text-gray-800">Project</h1>
            </div>
            <!-- <div class="grid border-2 border-red-500 left-[70%] absolute">
                <?php
                //if (session()->getFlashdata('crud-message-success')) {
                ?>
                    <div class="w-auto bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><? //= session()->getFlashdata('crud-message-success'); 
                                                        ?></span>
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                <?php
                //} elseif (session()->getFlashdata('crud-message')) {
                ?>
                    <?php
                    //$msg = session()->getFlashdata('crud-message');
                    //foreach (session()->getFlashdata('crud-message') as $rowmsg) : 
                    ?>
                        <div id="alertMsg" <?php //if ($rowmsg == "") {
                                            ?> hidden <?php
                                                        //} 
                                                        ?> class="bg-red-200 w-auto bg-opacity-50 border border-red-400 text-red-700 px-3 py-2 rounded relative" role="alert">
                            <span class="block sm:inline">
                                <? //= $rowmsg 
                                ?>
                            </span>
                            <button id="idCloseNotif" type="button" class=" text-red-400 rounded-lg ml-auto -mx-1.5 -my-1.5 hover:text-red-500 " onclick="closeNotif(this.id)" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    <?php //endforeach 
                    ?>
                <?php
                //} else {
                //}
                ?>
            </div> -->
        </div>

        <div>
            <div id="filter" class="w-full border-2 border-gray-600 justify-center items-center">
                <form action="/filter" method="POST">
                    <div class="grid grid-cols-5 m-2 gap-x-2 w-auto">
                        <div class="cols-span-2 flex items-center justify-center">Filter</div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Project Name</p>
                            <input type="text" value="<?php if (!isset($filterProjectNamePH)) {
                                                            echo "";
                                                        } else {
                                                            echo $filterProjectNamePH;
                                                        } ?>" name="filterProjectName" class="border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full">
                        </div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Client</p>
                            <select name="filterClient" id="filterClient" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full">
                                <?php if (isset($filterClientPH)) {
                                ?>
                                    <option selected disabled value="<?= $filterClientPH; ?>"><?= $filterClientPH; ?></option>
                                <?php
                                } ?>
                                <option value="all">All Client</option>
                                <?php foreach ($client as $row) : ?>
                                    <option value="<?= $row->client_name; ?>"><?= $row->client_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 justify-center items-center">
                            <p>Status</p>
                            <select name="filterStatus" id="filterStatus" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <?php if (isset($filterStatusPH)) {
                                ?>
                                    <option selected disabled value="<?= $filterStatusPH; ?>"><?= $filterStatusPH; ?></option>
                                <?php
                                } ?>
                                <option value="all">All Status</option>
                                <option value="OPEN">OPEN</option>
                                <option value="DOING">DOING</option>
                                <option value="DONE">DONE</option>
                            </select>
                        </div>
                        <div class="grid grid-row-1">
                            <div class="grid grid-cols-2 pb-1 justify-end items-end">
                                <div class="flex justify-center">
                                    <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">Search</button>
                                </div>
                                <div class="flex justify-center">
                                    <button @click.native="resetButton" type="reset" class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-fit">
                <div class="grid grid-cols-2 gap-x-1 m-3">
                    <button data-toggle="modal" data-target="#createModal" class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-3 py-1 text-base font-medium text-white hover:bg-primary-700">New</button>
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
                                <td><input name="selectId" value="<?= $row->project_name; ?>" type="checkbox"></td>
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
        <!-- Create Modal-->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create a new project</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createForm" action="/create" method="POST">
                            <div>
                                <label for="newProjectName" class="block mb-2 text-sm font-medium text-gray-900 ">Project Name</label>
                                <input type="text" name="newProjectName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            </div>
                            <div>
                                <label for="newProjectClient" class="block mb-2 text-sm font-medium text-gray-900  ">Client Name</label>
                                <select name="newProjectClient" id="newProjectClient" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  ">
                                    <?php foreach ($client as $row) : ?>
                                        <option value="<?= $row->client_id; ?>"><?= $row->client_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="newProjectStart" class="block mb-2 text-sm font-medium text-gray-900  ">Project Start</label>
                                <input type="date" max="<?= date('Y-m-d'); ?>" name="newProjectStart" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            </div>
                            <div>
                                <label for="newProjectEnd" class="block mb-2 text-sm font-medium text-gray-900  ">Project End</label>
                                <input type="date" name="newProjectEnd" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            </div>
                            <div>
                                <label for="newProjectClient" class="block mb-2 text-sm font-medium text-gray-900  ">Project Status</label>
                                <select name="newProjectStatus" id="newProjectStatus" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  ">
                                    <option value="OPEN">OPEN</option>
                                    <option value="DOING">DOING</option>
                                    <option value="DONE">DONE</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="w-auto text-white bg-slate-500 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center  ">Cancel</button>
                        <button @click="create" type="submit" class="w-auto text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center  ">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <?= $this->endSection('content'); ?>