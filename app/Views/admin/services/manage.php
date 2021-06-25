<?php echo view('admin/layout/head'); ?>
    <section>

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            Add New Service
        </button>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Created At</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($services as $service) { ?>
                <tr>
                    <th scope="row"><?php echo $service->id ?></th>
                    <td><?php echo $service->name ?></td>
                    <td><?php echo $service->price ?></td>
                    <td><?php echo $service->create_at ?></td>
                    <td>
                        <div class="row">

                            <div class="col-md-6">
                                <button onclick="edit(<?php echo $service->id ?>)" class="btn btn-success">
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
                <form action="<?php echo site_url('admin/service/create') ?>" method="post">
                    <?php csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <label for="name">Name</label>
                            <input required id="name" class="form-control" type="text" name="name" />
                        </div>
                        <div class="">
                            <label for="price">Price</label>
                            <input required id="price" class="form-control" type="text" name="price" />
                        </div>
                        <div class="">
                            <label for="description">Description</label>
                            <textarea required id="price" class="form-control" name="description" ></textarea>
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


    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="<?php echo site_url('admin/service/update') ?>" method="post">
                    <?php csrf_field() ?>
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <label for="name">Name</label>
                            <input required id="name" class="form-control" type="text" name="name" />
                        </div>
                        <div class="">
                            <label for="price">Price</label>
                            <input required id="price" class="form-control" type="text" name="price" />
                        </div>
                        <div class="">
                            <label for="description">Description</label>
                            <textarea id="price" class="form-control" name="description" ></textarea>
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
            url : "<?php echo site_url('admin/service/get_service') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                console.log(data);
                $('[name="id"]').val(data.id);

                $('[name="name"]').val(data.name);

                $('[name="price"]').val(data.price);

                $('[name="description"]').val(data.description);



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