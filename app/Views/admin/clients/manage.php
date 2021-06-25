<?php echo view('admin/layout/head'); ?>
    <!---->
    <!--    [client_id] => 1-->
    <!--    [invoice_id] => 12-->
    <!--    [full_name] => Ahmad Zaher Khrezaty-->
    <!--    [email] => ahmadkh@gmail.com-->
    <!--    [address] => this address is changed-->
    <!--    [sub_total] => 250-->
    <!--    [discount] => 0-->
    <!--    [type] => 1-->
    <!--    [total] => 250-->
    <!--    [created_at] => 2021-06-19 03:27:51-->
    <section>

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            Add New Client
        </button>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <th scope="row"><?php echo $client->id ?></th>
                    <td> <a href="<?php echo site_url('admin/client/show/'.$client->id)?>?group=details" ><?php echo $client->full_name ?></a></td>
                    <td><?php echo $client->email ?></td>
                    <td><?php echo $client->address ?></td>
                    <td><?php echo $client->phone_number ?></td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <button href="<?php echo site_url('admin/client/show/'.$client->id)?>?group=details" onclick="edit(<?php echo $client->id ?>)" class="btn btn-success">
                                    Edit
                                </button>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo site_url('admin/client/show/'.$client->id)?>?group=details" class="btn btn-primary">
                                    View
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="<?php echo site_url('admin/client/create') ?>" method="post">
                    <?php csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <label for="full_name">Full Name</label>
                            <input required id="full_name" class="form-control" type="text" name="full_name" />
                        </div>
                        <div class="">
                            <label for="email">Email</label>
                            <input required id="email" class="form-control" type="text" name="email" />
                        </div>
                        <div class="">
                            <label for="address">Address</label>
                            <input required id="address" class="form-control" type="text" name="address" />
                        </div>
                        <div class="">
                            <label for="company_name">Company Name</label>
                            <input required id="company_name" class="form-control" type="text" name="company_name" />
                        </div>
                        <div class="">
                            <label for="phone_number">Phone Number</label>
                            <input required id="phone_number" class="form-control" type="text" name="phone_number" />
                        </div>
                        <div class="">
                            <label for="password">Password</label>
                            <input required id="password" class="form-control" type="password" name="password" />
                        </div>
<!--                        <hr />-->
<!---->
<!--                        <div class="">-->
<!--                            <label for="server_name">Server Name</label>-->
<!--                            <input id="server_name" class="form-control" type="text" name="server_name" />-->
<!--                        </div>-->
<!--                        <div class="">-->
<!--                            <label for="database_name">Database Name</label>-->
<!--                            <input id="database_name" class="form-control" type="text" name="database_name" />-->
<!--                        </div>-->
<!--                        <div class="">-->
<!--                            <label for="database_username">Database Username</label>-->
<!--                            <input id="database_username" class="form-control" type="text" name="database_username" />-->
<!--                        </div>-->
<!--                        <div class="">-->
<!--                            <label for="database_password">Database Password</label>-->
<!--                            <input id="database_password" class="form-control" type="text" name="database_password" />-->
<!--                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <form action="<?php echo site_url('admin/client/update') ?>" method="post">
                    <?php csrf_field() ?>
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <label for="full_name">Full Name</label>
                            <input required id="efull_name" class="form-control" type="text" name="full_name" />
                        </div>
                        <div class="">
                            <label for="email">Email</label>
                            <input required id="eemail" class="form-control" type="text" name="email" />
                        </div>
                        <div class="">
                            <label for="address">Address</label>
                            <input required id="eaddress" class="form-control" type="text" name="address" />
                        </div>
                        <div class="">
                            <label for="company_name">Company Name</label>
                            <input required id="ecompany_name" class="form-control" type="text" name="company_name" />
                        </div>
                        <div class="">
                            <label for="phone_number">Phone Number</label>
                            <input required id="ephone_number" class="form-control" type="text" name="phone_number" />
                        </div>
                        <div class="">
                            <label for="password">Password</label>
                            <input required id="epassword" class="form-control" type="password" name="password" />
                        </div>
<!--                        <hr />-->
<!---->
<!--                        <div class="">-->
<!--                            <label for="server_name">Server Name</label>-->
<!--                            <input id="eserver_name" class="form-control" type="text" name="server_name" />-->
<!--                        </div>-->
<!--                        <div class="">-->
<!--                            <label for="database_name">Database Name</label>-->
<!--                            <input id="edatabase_name" class="form-control" type="text" name="database_name" />-->
<!--                        </div>-->
<!--                        <div class="">-->
<!--                            <label for="database_username">Database Username</label>-->
<!--                            <input id="edatabase_username" class="form-control" type="text" name="database_username" />-->
<!--                        </div>-->
<!--                        <div class="">-->
<!--                            <label for="database_password">Database Password</label>-->
<!--                            <input id="edatabase_password" class="form-control" type="text" name="database_password" />-->
<!--                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php echo view('admin/layout/footer'); ?>


    <script>

        function edit(id)
        {
            save_method = 'update';
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('admin/client/get_client') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {

                    $('[name="id"]').val(data.id);

                    $('[name="full_name"]').val(data.full_name);

                    $('[name="email"]').val(data.email);

                    $('[name="address"]').val(data.address);

                    $('[name="company_name"]').val(data.company_name);

                    $('[name="phone_number"]').val(data.phone_number);

                    $('[name="password"]').val(data.password);
                    //
                    // $('[name="server_name"]').val(data.client_database.server_name);
                    //
                    // $('[name="database_name"]').val(data.client_database.database_name);
                    //
                    // $('[name="database_username"]').val(data.client_database.database_username);
                    //
                    // $('[name="database_password"]').val(data.client_database.database_password);



                    $('#edit').modal('show'); // show bootstrap modal when complete loaded

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from api');
                }
            });
        }
    </script>

<?php echo view('admin/layout/tail'); ?>