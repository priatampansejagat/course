<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/visitor/images/logo-research-academy.png">
    <title> <?= $title ?> | Research Academy</title>

    <style>
        .signature,
        .title {
            float: left;
            border-top: 1px solid #000;
            width: 200px;
            text-align: center;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #certificate,
            #certificate * {
                visibility: visible;
            }

            #certificate {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <center>
        <div id="certificate">
            <div style="width:1123px; height:750px; padding:20px; text-align:center; border: 10px solid #231f20;"">
                <div style=" width:1073‬px; height:700px; padding:20px; text-align:center; border: 5px solid #ffc000;">
                <img src="<?= base_url('assets/visitor/images/logo-research-academy-dark.png') ?>" alt="" style="width: 10%"><br><br>
                <span style="font-size:35px; font-weight:bold;text-decoration: underline;">Certificate of Completion</span>
                <br><br><br>
                <span style="font-size:20px"><i>This is to certify that</i></span>
                <br><br>
                <span style="font-size:25px; text-transform: capitalize"><b><?= $_SESSION["fullname"] ?></b></span><br><br>
                <span style="font-size:20px"><i>has completed the course</i></span> <br><br>
                <span style="font-size:25px; text-transform: capitalize"><?= $data_course->data->course_detail->title ?></span> <br><br>
                <span style="font-size:20px"><i>Completed Date</i></span><br>
                <span style="font-size:20px"><i><?= dateFormat($data_course->data->course_detail->end_date) ?></i></span><br><br><br>
                <table>
                    <tr>
                        <td style="width: 30%;">
                            <img src="<?= base_url('assets/visitor/images/stamp.png') ?>" alt="" style="width: 15%; position: absolute; z-index: -100; top: 590px; left: 120px; vertical-align: top;"><br><br><br><br><br><br><br>
                            <span style="font-size:20px"><i>Issue Date</i></span><br>
                            <span style="font-size:25px; text-transform: capitalize; text-decoration: underline;"><b><?= dateFormat($data_course->data->course_detail->end_date) ?></b></span><br>
                            <span style="font-size:15px"><i>Seal</i></span><br><br>
                        </td>
                        <td style="width: 40%;">
                            <img src="<?= base_url('assets/visitor/images/ttd_asep_irawan.png') ?>" alt="" style="width: 55%"><br>
                            <span style="font-size:25px; text-transform: capitalize; text-decoration: underline;"><b>Asep Irawan</b></span><br>
                            <span style="font-size:15px"><i>Managing Director of Research Academy</i></span><br><br>
                        </td>
                        <td style="width: 30%; text-align: left;">
                            <br><br><br><br><br><br><br>
                            <span style="font-size:15px;">Certificate No.</span><br>
                            <span style="font-size:25px; text-decoration: underline;"><b><?= $cert_no[0][0] ?>/IRC/<?= dateRomawi($data_course->data->course_detail->end_date) ?></b></span><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </center>
</body>

<script>
    $(document).ready(function() {
        printDiv('certificate');
    });

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    //# sourceURL=/view/class/certificate.js
</script>

</html>