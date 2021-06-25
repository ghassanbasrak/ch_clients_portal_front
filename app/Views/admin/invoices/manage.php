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
            Add New Invoice
        </button>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">address</th>
                <th scope="col">Sub total</th>
                <th scope="col">Total</th>
                <th scope="col">Discount</th>
                <th scope="col">Type</th>
                <th scope="col">Created At</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($invoices as $invoice) { ?>
                <tr>
                    <th scope="row"><?php echo $invoice->invoice_id ?></th>
                    <td><?php echo $invoice->full_name ?></td>
                    <td><?php echo $invoice->email ?></td>
                    <td><?php echo $invoice->address ?></td>
                    <td><?php echo $invoice->sub_total ?></td>
                    <td><?php echo $invoice->total ?></td>
                    <td><?php echo $invoice->discount ?></td>
                    <td><?php echo $invoice->type ?></td>
                    <td><?php echo $invoice->created_at ?></td>
                    <td>
                        <div class="row">

                            <div class="col-md-6">
                                <a href="<?php echo site_url('admin/invoice/pdf/'.$invoice->invoice_id) ?>" class="btn btn-success">
                                    PDF
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a target="_blank" href="<?php echo site_url('admin/invoice/show/'.$invoice->invoice_id) ?>" class="btn btn-primary">
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
                <form action="<?php echo site_url('admin/invoice/create') ?>" method="post">
                    <?php csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="client">Client</label>
                            <select required name="client" id="client" class="form-control">
                                <?php foreach ($clients as $client) {?>
                                    <option value="<?php echo $client->id ?>"><?php echo $client->full_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="type">Type</label>
                            <select required name="type" id="type" class="form-control">
                                <?php foreach ([1, 2, 3, 4] as $type) {?>
                                    <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center h-100 mt-3">

                        <div class="mr-4">
                            Services:
                        </div>
                        <div id="services">
                            <?php foreach($services as $service){ ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input name="service[<?php echo $service->id ?>][id]" class="form-check-input" type="checkbox" onclick="calc(<?php echo $service->id ?>, <?php echo $service->price ?>)" value="<?php echo $service->id ?>" id="<?php echo $service->id ?>">
                                            <label class="form-check-label" for="<?php echo $service->id ?>">
                                                <?php echo $service->name ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="input-group row">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input name="service[<?php echo $service->id ?>][price]" type="text" class="form-control" value="<?php echo $service->price ?>" aria-label="Amount (to the nearest dollar)">

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="sub_total">Sub Total:</label>
                            <input required id="sub_total" class="form-control" type="number" value="0" name="sub_total" />
                        </div>
                        <div class="col-md-4">
                            <label for="discount">Discount:</label>
                            <input required id="discount" class="form-control" type="number" value="0" name="discount" />
                        </div>
                        <div class="col-md-4">
                            <label for="total">Total:</label>
                            <input required id="total" class="form-control" type="number" value="0" name="total" />
                        </div>
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
        function calc(id, price)
        {
            var checked =($('[name="service['+ id +'][id]"]').prop('checked'));
            price = ($('[name="service['+ id +'][price]"]').val())

            var sub_total_selector
            var old_sub_total
            var sub_total
            var total_selector
            var discount
            var total

            if(checked)
            {
                sub_total_selector = $('#sub_total');
                old_sub_total = sub_total_selector.val();
                sub_total = parseInt(old_sub_total) + parseInt(price);
            }
            else
            {
                sub_total_selector = $('#sub_total');
                old_sub_total = sub_total_selector.val();
                sub_total = parseInt(old_sub_total) - parseInt(price);
            }

             total_selector = $('#total');
             discount = $('#discount').val();
             total = parseInt(sub_total) - parseInt(discount);

            sub_total_selector.val(sub_total)
            total_selector.val(total)
        }

        $( "#discount" ).change(function() {
            var discount = $('#discount').val();

            var sub_total = $('#sub_total').val();
            $('#total').val(parseInt(sub_total) - parseInt(discount));
        });
    </script>
<?php echo view('admin/layout/tail'); ?>