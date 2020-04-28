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
                <li><a href="shop.html">Course</a></li>
                <li class="active">Invoice</li>
            </ol>
        </div>
    </nav>
    <!-- cart content block -->
    <section class="cart-content-block container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <table class="table cart-data-table" cellspacing="0" cellpadding="0" style="border: none !important;">
                        <tr>
                            <th>Invoice No.</th>
                            <td><?= $data_payment->data->trans_code ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?= $_SESSION["fullname"] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
        </div>
        <!-- cart form -->
        <form action="#" class="cart-form">
            <div class="table-wrap">
                <!-- cart data table -->
                <table class="table tab-full-responsive cart-data-table font-lato">
                    <thead class="hidden-xs">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-title="Product">
                                <div>
                                    <div class="pro-name-wrap">
                                        <div class="descr-wrap">
                                            <h3 class="fw-normal"><?= $data_payment->data->event->title ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-title="Price">
                                <span><strong class="price element-block"><?= $data_payment->data->nominal ?></strong></span>
                            </td>
                            <td data-title="Quantity">
                                <span><strong class="price element-block"> 1</strong></span>
                            </td>
                            <td data-title="Total">
                                <span><strong class="element-block price"><?= $data_payment->data->nominal ?></strong></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-6 col-md-6">
                    <button type="submit" class="btn btn-warning btn-theme font-lato fw-bold text-uppercase element-block">Confirmation of Payment</button>
                </div>
            </div>
        </form>
    </section>
</main>