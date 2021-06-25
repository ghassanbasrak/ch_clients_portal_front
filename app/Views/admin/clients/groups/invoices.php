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
            <th scope="row"><?php echo $invoice->id ?></th>
            <td><?php echo $client->full_name ?></td>
            <td><?php echo $client->email ?></td>
            <td><?php echo $client->address ?></td>
            <td><?php echo $invoice->sub_total ?></td>
            <td><?php echo $invoice->total ?></td>
            <td><?php echo $invoice->discount ?></td>
            <td><?php echo $invoice->type ?></td>
            <td><?php echo $invoice->created_at ?></td>
            <td>
                <div class="row">

                    <div class="col-md-6">
                        <a href="<?php echo site_url('admin/invoice/pdf/'.$invoice->id) ?>" class="btn btn-success">
                            PDF
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a target="_blank" href="<?php echo site_url('admin/invoice/show/'.$invoice->id) ?>" class="btn btn-primary">
                            View
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>