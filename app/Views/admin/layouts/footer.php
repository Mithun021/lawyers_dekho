</div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= date('Y') ?> © MBVY.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Design & Develop by Dcode Materials
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Overlay-->
        <div class="menu-overlay"></div>


        <!-- jQuery  -->
        <script src="<?= base_url() ?>public/admin/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/admin/assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>public/admin/assets/js/metismenu.min.js"></script>
        <script src="<?= base_url() ?>public/admin/assets/js/waves.js"></script>
        <script src="<?= base_url() ?>public/admin/assets/js/simplebar.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url() ?>public/admin/assets/js/theme.js"></script>

         <!-- third party js -->
        <script src="<?= base_url() ?>public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/buttons.flash.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/dataTables.select.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/datatables/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="<?= base_url() ?>public/admin/assets/pages/datatables-demo.js"></script>
        <script src="<?= base_url() ?>public/admin/assets/js/adminScript.js"></script>

         <!-- Plugins js -->
        <!-- <script src="<?= base_url() ?>public/admin/plugins/katex/katex.min.js"></script>
        <script src="<?= base_url() ?>public/admin/plugins/quill/quill.min.js"></script>
     -->
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        <!-- Init js-->
        <script src="<?= base_url() ?>public/admin/assets/pages/quilljs-demoss.js"></script>

        <!-- Jquery Validation Plugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            CKEDITOR.replace( 'cke-editor' );
            CKEDITOR.replace( 'cke-editor2' );
            CKEDITOR.on( 'instanceReady', function( evt )
                {
                var editor = evt.editor;
                
                editor.on('change', function (e) { 
                var contentSpace = editor.ui.space('contents');
                var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
                var ckeditorFrame = ckeditorFrameCollection[0];
                var innerDoc = ckeditorFrame.contentDocument;
                var innerDocTextAreaHeight = $(innerDoc.body).height();
                console.log(innerDocTextAreaHeight);
                });
            });

            

        </script>

    </body>

</html>