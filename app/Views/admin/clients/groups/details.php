<div class="ml-5 mr-5">
    <form action="<?php echo site_url('admin/client/update') ?>" method="post">
        <?php csrf_field() ?>
        <input type="hidden" name="id" value="<?php echo $client->id ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input required id="full_name" class="form-control" value="<?php echo $client->full_name ?>" type="text" name="full_name" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required id="email" class="form-control" value="<?php echo $client->email ?>" type="text" name="email" />
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input required id="address" class="form-control" value="<?php echo $client->address ?>" type="text" name="address" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input required id="phone_number" class="form-control" value="<?php echo $client->phone_number ?>" type="text" name="phone_number" />
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input required id="company_name" class="form-control" value="<?php echo $client->company_name ?>" type="text" name="company_name" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required id="password" class="form-control" value="<?php echo $client->password ?>" type="password" name="password" />
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>