<?= $this->extend("admin/layouts/master") ?>
<?=  $this->section("body-content"); ?>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h5 class="m-0 text-title">Create Page</h5></div>
            <form action="<?= base_url() ?>admin/create_page" method="post">
            <div class="card-body">
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
    <div class="col-lg-4">
        <div class="card">
            
        </div>
    </div>
</div>

<?= $this->endSection() ?>