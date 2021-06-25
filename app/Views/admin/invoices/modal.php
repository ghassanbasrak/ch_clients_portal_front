<!-- Modal -->
<div class="modal fade" id="addInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <?php if(isset($client)){ ?>
                        <input type="hidden" name="client" value="<?php echo $client->id ?>">
                    <?php } else { ?>
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
                    <?php } ?>
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

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="chooseServices">Services</label>
                            <select required id="chooseServices" class="form-control">
                                <option selected disabled id="none">
                                    Please select service to add to invoice items
                                </option>
                                <?php foreach ($services as $service) {?>
                                    <option data-price="<?php echo $service->price ?>" value="<?php echo $service->id ?>"><?php echo $service->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center h-100 mt-3">

                        <div id="" class="mr-4">
                            <div id="items" class="form-group">

                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="sub_total">Sub Total:</label>
                            <input required id="sub_total" class="form-control" type="number" value="0" name="sub_total" />
                        </div>
                        <div class="col-md-4">
                            <label for="discount">Discount:</label>
                            <input required id="discount" class="form-control" onchange="calculate()" type="number" value="0" name="discount" />
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