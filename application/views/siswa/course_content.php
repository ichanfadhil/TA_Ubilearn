<main class="mdl-layout__content">
    <div class="mdl-grid cover-main"  >
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
            <div class="">
                <div class="">
                    <h2 style="color:white;text-align:center;">Matakuliah : <?php echo $kontent->crs_name?></h2>
                    <div style="text-align:center">
                        <img src="<?php echo base_url();?>/res/assets/images/uploads/<?php echo $kontent->usr_picture;?>" class="material-icons mdl-list__item-avatar" style="width: 100px; height: 100px;">
                        <h3 style="color:white;"><?php echo $kontent->usr_firstname." ".$kontent->usr_lastname?></h3>
<!--                        <p style="color:white;">--><?php //$converted = date('d M Y h.i.s A', strtotime($assignment->asg_timecreated));
//                            $reversed = date('Y-m-d', strtotime($converted));
//                            echo $reversed;
//                            ?>
<!--                        </p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mdl-grid">

        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
            <div class="mdl-card mdl-shadow--2dp pie-chart">
                <div class="mdl-card__supporting-text">
                    <div style="margin: 15px; color: white;">
                        <?php echo $kontent->cnt_desc;?>
                    </div>
                    <ul class="mdl-list" style="margin: 15px;">
                        <a href="<?php echo site_url()?>res/assets/content/<?php echo $kontent->cnt_source?>" target="_blank">
                            <li class="mdl-list__item" style="background-color: #97b0b5" >
                         <span class="mdl-list__item-primary-content">
                            <span style="margin-right: 25px;">
                                <iframe src="<?php echo base_url()?>res/assets/content/<?php echo $kontent->cnt_source?>" style="scroll: hidden;"  frameborder="0"></iframe>
                            </span>
                               <b class="mdl-list__item-secondary-action"><?php echo $kontent->cnt_name?></b>
                        </span>
                                <div class="mdl-layout-spacer"></div>
                            </li>
                        </a>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!--    <div class="col-md-2 hidden-xs">-->
    <!--        <img src="--><?php //echo base_url();?><!--res/assets/images/uploads/avatar_default.jpg" class="img-responsive img-thumbnail" id="blah">            </div>-->
    <!--    </div>-->

</main>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

