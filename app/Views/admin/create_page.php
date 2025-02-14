<?= $this->extend("admin/layouts/master") ?>
<?=  $this->section("body-content"); ?>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h5 class="m-0 text-title">Create Page</h5></div>
            <form action="<?= base_url() ?>admin/create_page" method="post">
            <div class="card-body">
            <?php
                if (session()->getFlashdata('status')) {
                    echo session()->getFlashdata('status');
                }
            ?>
                <div class="form-group">
                    <span>Page Name</span>
                    <input type="text" name="page_name" class="form-control" required>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <input type="submit" value="Create Page" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h5 class="m-0">Pages List</h5></div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-bordered nowrap">
                    <thead class="bg-light">
                        <tr>
                            <td>#</td>
                            <td>Page Name</td>
                            <td>Slug</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pages as $key => $value){ ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $value['page_name'] ?></td>
                            <td><?= base_url().$value['slug'] ?></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                    <button type="button" class="btn btn-dark waves-effect waves-light">Edit</button>
                                    <button type="button" class="btn btn-dark waves-effect waves-light">Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>