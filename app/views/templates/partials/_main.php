<div id="main">
    <div class="container">
        <div class="row">
            <!-- About Me (Left Sidebar) Start -->
            <div class="col-md-3">
                <?php include_once '../app/views/templates/partials/_aside.php' ?>
            </div>
            <!-- About Me (Left Sidebar) End -->

            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
                <div class="col-md-12 page-body">
                    <div class="row">
                        <div class="col-md-12 content-page">
                            <!-- ADD A POST -->
                            <?php include_once '../app/views/templates/partials/_addpost.php' ?>
                            <!-- ADD A POST END -->
                            <!-- Blog Post Start -->
                            <?php echo $content ?>
                            <!-- Blog Post End -->
                        </div>
                        <!-- Footer Start -->
                        <div class="col-md-12 page-body margin-top-50 footer">
                            <?php include_once '../app/views/templates/partials/_footer.php' ?>
                        </div>
                        <!-- Footer End -->
                    </div>
                    <!-- Blog Post (Right Sidebar) End -->
                </div>
            </div>
        </div>
    </div>
</div>