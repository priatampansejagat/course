<!-- contain main informative part of the site -->
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
                <li class="active">Payment</li>
            </ol>
        </div>
    </nav>
    <!-- cart content block -->
    <section class="cart-content-block container">
        <!-- cart form -->
        <form action="#" class="cart-form">
            <div class="table-wrap">
                <!-- cart data table -->
                <table class="table tab-full-responsive cart-data-table font-lato" id="list-payment">
                    <thead class="hidden-xs">
                        <tr>
                            <th style="width: 35%">Payment Code</th>
                            <th style="width: 20%">Total</th>
                            <th style="width: 30%">Status</th>
                            <!-- <th style="width: 25%"></th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
    </section>
</main>

<script>
    var id_user = '<?= $this->session->userdata["id"] ?>';
    $(document).ready(function() {
        dataTable = $("#list-payment").DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: false,
            searching: false,
            order: [
                [1, "asc"]
            ],
            language: {
                emptyTable: "Data tidak tersedia",
                zeroRecords: "Tidak ada data yang ditemukan",
                infoFiltered: "",
                infoEmpty: "",
                paginate: {
                    "previous": '‹',
                    "next": '›'
                },
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ Pengguna",
                aria: {
                    "paginate": {
                        "previous": 'Previous',
                        "next": 'Next'
                    }
                }
            },

            ajax: {
                url: base_url + post_url,
                type: "POST",
                data: function(d) {
                    console.log($("#role").val());
                    var data = {
                        param: {
                            length: d.length,
                            page: d.start / d.length + 1,
                            draw: d.draw,
                            "ihateapple": "payment_all",
                            "id_user": id_user
                        },
                        url: get_datatable_url
                    }
                    return data;
                },
                dataSrc: function(response) {
                    // console.log(response);
                    return response.data;
                }
            },
            columns: [{
                    "data": "id"
                },
                {
                    "data": "nominal"
                },
                {
                    "data": "status"
                },
                // {
                //     "data": {
                //         status: "status",
                //         id: "id"
                //     }
                // },
            ],
            columnDefs: [{
                    targets: 1,
                    searchable: false,
                    orderable: false,
                    createdCell: function(td, cellData, rowData, row, col) {
                        var html = formatRupiah(cellData, "Idr");
                        $(td).html(html);
                    }
                },
                {
                    targets: 2,
                    searchable: false,
                    orderable: false,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (cellData == 1) {
                            var html = '<p class="text-success">Waiting Confirmation from System</p>';
                        } else if (cellData == 2) {
                            var html = '<p class="text-success">Success</p>';
                        } else if (cellData == 3) {
                            var html = '<p class="text-danger">Failed</p>';
                        } else {
                            var html = '<p class="text-warning">Waiting for Confirmation</p>';
                        }
                        $(td).html(html);
                    }
                },
                // {
                //     targets: 3,
                //     searchable: false,
                //     orderable: false,
                //     createdCell: function(td, cellData, rowData, row, col) {
                //         var id = cellData.id;
                //         if (cellData.status == 1) {
                //             console.log(typeof(cellData.id));
                //             var html = '<a href="#" class="btn disabled" style="background-color: #b3b3b3; color:white; width: 200px;">Menunggu Konfirmasi Admin</a>';
                //         } else {
                //             var html = '<a href="<?= base_url("paymentconfirmation/") ?>' + cellData.id +
                //                 '" class="btn btn-warning" style="width: 200px;">Send Payment Confirmation</a>';
                //         }
                //         $(td).addClass("text-center");
                //         $(td).html(html);
                //     }
                // }
            ]
        });
    });
</script>