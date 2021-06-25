<?php echo view('admin/layout/head'); ?>
    <section>

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            Add New User
        </button>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <th scope="row"><?php echo $user->id ?></th>
                    <td><?php echo $user->full_name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->phone_number ?></td>
                    <td><?php echo $user->address ?></td>
                    <td><?php echo $user->role ?></td>
                    <td>
                        <div class="row">

                            <div class="col-md-6">
                                <button onclick="edit(<?php echo $user->id ?>)" class="btn btn-success">
                                    Edit
                                </button>
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
                <form action="<?php echo site_url('admin/user/create') ?>" method="post">
                    <?php csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
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
                            <label for="phone_number">Phone Number</label>
                            <input required id="phone_number" class="form-control" type="text" name="phone_number" />
                        </div>
                        <div class="">
                            <label for="address">Address</label>
                            <input required id="address" class="form-control" type="text" name="address" />
                        </div>
                        <div class="">
                            <label for="role">Role</label>
                            <select required name="role" id="role" class="form-control">
                                <?php foreach (['manager', 'editor', 'financial'] as $type) {?>
                                    <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="password">Password</label>
                            <input required id="password" class="form-control" type="password" name="password" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="<?php echo site_url('admin/user/update') ?>" method="post">
                    <?php csrf_field() ?>
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
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
                            <label for="phone_number">Phone Number</label>
                            <input required id="ephone_number" class="form-control" type="text" name="phone_number" />
                        </div>
                        <div class="">
                            <label for="address">Address</label>
                            <input required id="eaddress" class="form-control" type="text" name="address" />
                        </div>
                        <div class="">
                            <label for="role">Role</label>
                            <select required name="role" id="erole" class="form-control">
                                <?php foreach (['manager', 'editor', 'financial'] as $type) {?>
                                    <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="password">Password</label>
                            <input required id="epassword" class="form-control" type="password" name="password" />
                        </div>
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
            url : "<?php echo site_url('admin/user/get_user') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //full_name
                //email
                //phone_number
                //address
                //role
                //password

                console.log(data);
                $('[name="id"]').val(data.id);

                $('[name="full_name"]').val(data.full_name);

                $('[name="email"]').val(data.email);

                $('[name="phone_number"]').val(data.phone_number);

                $('[name="address"]').val(data.address);

                $('[name="role"]').val(data.role);

                $('[name="password"]').val(data.password);



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