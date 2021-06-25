<div class="ml-5 mr-5">
    <form action="<?php echo site_url('admin/client/update_database') ?>" method="post">
        <?php csrf_field() ?>
        <input type="hidden" name="id" value="<?php echo $client->id ?>">

        <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="server_name">Server Name</label>
                    <input required id="server_name" class="form-control" value="<?php echo $client->client_database->server_name ?>" type="text" name="server_name" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="database_name">Database Name</label>
                    <input required id="database_name" class="form-control" value="<?php echo $client->client_database->database_name ?>" type="text" name="database_name" />
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="database_username">Database Username</label>
                    <input required id="database_username" class="form-control" value="<?php echo $client->client_database->database_username ?>" type="text" name="database_username" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="database_password">Database Password</label>
                    <input required id="database_password" class="form-control" value="<?php echo $client->client_database->database_password ?>" type="text" name="database_password" />
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>