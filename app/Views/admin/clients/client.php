<?php echo view('admin/layout/head'); ?>

    <section>

        <nav class="nav nav-pills nav-justified p-2">
            <a class="nav-item nav-link <?php if($group == 'details') echo 'active' ?>" href="<?php echo site_url('admin/client/show/' . $client->id)?>?group=details">Details</a>
            <a class="nav-item nav-link <?php if($group == 'database') echo 'active' ?>" href="<?php echo site_url('admin/client/show/' . $client->id)?>?group=database">Database</a>
            <a class="nav-item nav-link <?php if($group == 'invoices') echo 'active' ?>" href="<?php echo site_url('admin/client/show/' . $client->id)?>?group=invoices">Invoices</a>
            <a class="nav-item nav-link <?php if($group == 'apikeys') echo 'active' ?> disabled" href="#">Api Keys</a>
            <a class="nav-item nav-link <?php if($group == 'payments') echo 'active' ?> disabled" href="#">Payments</a>
        </nav>
        <hr>
        <div class="container mt-5">
            <?php echo view('admin/clients/groups/' . $group) ?>
        </div>
    </section>


<?php echo view('admin/layout/footer'); ?>


<?php echo view('admin/layout/tail'); ?>