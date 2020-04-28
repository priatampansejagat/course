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
                <li><a href="event-sigle.html">Events</a></li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-12">
                <!-- visualImageHolder -->
                <div class="aligncenter visualImageHolder">
                    <img src="<?= $data_event->event_info->cover_link ?>" alt="image description" style="max-height: 400px;">
                    <!-- captionAddress -->
                    <address class="captionAddress bg-theme">
                        <div class="addressColumn">
                            <i class="far fa-clock icn text-white"></i>
                            <strong class="title text-uppercase fw-semi element-block">start time :</strong>
                            <strong class="fw-normal element-block"><time datetime="<?= $data_event->event_info->start_date ?>"><?= $data_event->event_info->start_date ?></time></strong>
                        </div>
                        <div class="addressColumn">
                            <i class="far fa-flag icn text-white"></i>
                            <strong class="title text-uppercase fw-semi element-block">Finish time :</strong>
                            <strong class="fw-normal element-block"><time datetime="<?= $data_event->event_info->end_date ?>"><?= $data_event->event_info->end_date ?></time></strong>
                        </div>
                        <div class="addressColumn">
                            <i class="fas fa-map-marker-alt icn text-white"></i>
                            <strong class="title text-uppercase fw-semi element-block">Price</strong>
                            <strong class="fw-normal element-block"><?= rupiah($data_event->event_info->price, 'Idr') ?></strong>
                        </div>
                    </address>
                </div>
                <h1><?= $data_event->event_info->title ?></h1>
                <h3 class="content-h3">Event Description</h3>
                <p><?= $data_event->event_info->description ?></p>
                <!-- ticketsInfoAside -->
                <aside class="ticketsInfoAside bg-dark">
                    <!-- ticketsInfoList -->
                    <!-- <div id="defaultCountdown" class="comming-timer"></div> -->
                    <div class="price-event">
                        <h1 style="color: #ffc000"><?= rupiah($data_event->event_info->price, 'Idr') ?></h1>
                    </div>
                    <a href="registevent/<?= $data_event->event_info->id ?>" class="btn btn-default btn-white text-uppercase fw-bold font-lato">buy tickets</a>
                </aside>
                <h3 class="content-h3">Event Content</h3>
                <!-- eventContentTabsWrap -->
                <div class="eventContentTabsWrap">
                    <ul class="nav nav-tabs no-shrink font-lato" role="tablist">
                        <li role="presentation" class="active"><a href="#DiscussAbout" aria-controls="DiscussAbout" role="tab" data-toggle="tab">Discuss About</a></li>
                        <li role="presentation"><a href="#Participants" aria-controls="Participants" role="tab" data-toggle="tab">Mentor</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="DiscussAbout">
                            <ul class="list-unstyled listDefault">
                                <?php foreach ($data_event->course_list as $key => $value) {
                                    echo ('<li>' . $value->title . '</li>');
                                } ?>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Participants">
                            <ul class="list-unstyled listDefault">
                                <?php foreach ($data_event->course_list as $key => $value) { ?>
                                    <li><a href="<?= base_url('mentordetail/' . $value->mentor_detail->id) ?>"><?= $value->mentor_detail->fullname ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- mapHolder -->
                <h3 class="content-h3">Gallery</h3>
                <div class="gallery">

                </div>
            </article>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: base_url + post_url,
            data: {
                param: {
                    "ihateapple": "event_gallery",
                    "event_id": "<?= $data_event->event_info->id ?>"
                },

                url: get_datatable_url
            },
            success: function(data) {
                var dataJson = $.parseJSON(data);
                for (var index = 0; index < dataJson.data.gallery_list.length; index++) {
                    $(".gallery").append('<div class="col-xs-12 col-sm-4 col-lg-4" style="margin-bottom: 20px">' +
                        '<div class="aligncenter">' +
                        '<a target="_blank" href="' + dataJson.data.gallery_list[index]['picture_link'] + '">' +
                        '<img src="' + dataJson.data.gallery_list[index]['picture_link'] + '" alt="Cinque Terre" style="height:250px; width: 100%; object-fit: cover; object-position: 100% 0;">' +
                        '</a>' +
                        '</div>' +
                        '</div>');
                }
            }
        });
    });

    //# sourceURL=/view/event/detail.js
</script>