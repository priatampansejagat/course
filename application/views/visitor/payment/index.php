<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url(<?= base_url(); ?>assets/visitor/images/banner.png);">
        <div class="container holder">
            <div class="align">
                <h1><?= $page_title ?></h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="home.html">Home</a></li>
                <li class="active">Payment Confirmation</li>
            </ol>
        </div>
    </nav>
    <!-- user log block -->
    <section class="container user-log-block">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="message"></div>
                <!-- user log form -->
                <form action="#" class="user-log-form" name="form-payment">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="regist_no">Registration Number</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="regist_no" name="regist_no" class="form-control element-block" placeholder="Registration Number" value="<?= $id_payment ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="nominal">Nominal</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="nominal" name="nominal" class="form-control element-block" placeholder="Nominal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <label for="file_payment">Proof of Payment</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <a href="#" id="choose_file" class="btn btn-warning">Choose File</a>
                                <div id="results" class="panel"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <label for="2"> &nbsp;</label>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <div class="btns-wrap">
                                <a href="#" id="send" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Send</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<script>
    var regist_no = $('#regist_no').val(),
        nominal = $('#nominal').val(),
        resumableButton = $("#choose_file"),
        results = $("#results"),
        resumable = new Resumable({
            target: noncurl_api_url + send_paymentfile_url,
            maxChunkRetries: 5,
            query: {
                payment_id: regist_no
            },
            maxFiles: 3,
            prioritizeFirstAndLastChunk: true,
            simultaneousUploads: 4,
            chunkSize: 1 * 1024 * 1024
        });

    resumable.assignBrowse(resumableButton);

    resumable.on('fileAdded', function(file, event) {

        var template =
            '<div data-uniqueid="' + file.uniqueIdentifier + '">' +
            '<div class="fileName">' + file.fileName + ' (' + file.file.type + ')' + '</div>' +
            '<div style="color:red;" class="large-6 right deleteFile" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></div>' +
            '<div class="progress large-6">' +
            '<span class="meter" style="width:0%;"></span>' +
            '</div>' +
            '</div>';

        results.append(template);
    });

    $(document).on('click', '.deleteFile', function() {
        var self = $(this),
            parent = self.parent(),
            identifier = parent.data('uniqueid'),
            file = resumable.getFromUniqueIdentifier(identifier);

        resumable.removeFile(file);
        parent.remove();
    });

    $("#send").click(function() {
        var nominal = $('#nominal').val();
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "payment_id": regist_no,
                    "payment_nominal": nominal
                },
                url: send_payment_url
            },
            success: function(respons) {
                if (results.children().length > 0) {
                    resumable.upload();
                } else {
                    // nothingToUpload.show();
                }

                resumable.on('fileProgress', function(file) {
                    //Action
                });

                resumable.on('uploadStart', function() {
                    // action
                });

                resumable.on('complete', function() {
                    // Action
                    window.location.href = "<?= base_url("User/payment") ?>";
                });

                resumable.on('fileError', function(file, message) {
                    //Action
                });
            }
        });
    });

    //# sourceURL=/view/payment/payment.js
</script>