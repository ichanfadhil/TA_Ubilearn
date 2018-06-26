<style>
    mark {
        background-color: yellow;
    }
</style>
<script>
    $(function() {
    $('#anying1').change(function() {
        window.location.href = "<?php if
        ($this->session->userdata("dataLS") == "sacq"){echo site_url('siswa/sacq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "svcq"){echo site_url('siswa/svcq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "sarg"){echo site_url('siswa/sarg/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "sarq"){echo site_url('siswa/sarq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "narq"){echo site_url('siswa/narq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "narg"){echo site_url('siswa/narg/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "nacq"){echo site_url('siswa/nacq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "nacg"){echo site_url('siswa/nacg/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "svcg"){echo site_url('siswa/svcg/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "svrg"){echo site_url('siswa/svrg/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "svrq"){echo site_url('siswa/svrq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "nvrq"){echo site_url('siswa/nvrq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "nvrg"){echo site_url('siswa/nvrg/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "nvcq"){echo site_url('siswa/nvcq/' . $course->lsn_id);}
        else if($this->session->userdata("dataLS") == "nvcg"){echo site_url('siswa/nvcg/' . $course->lsn_id);} ?>";
    })
  })
    </script>
<main class="mdl-layout__content">
    <div class="mdl-grid cover-main">
        <div class="mdl-cell mdl-cell--12-col">
            <h1 style="color:white; text-align:center;"><?php echo $course->crs_name ?></h1><br>
            <p style="color:white; text-align:center;"><?php echo $course->usr_firstname . ' ' . $course->usr_lastname ?></p>
            <div style="text-align:center">
            <input id="anying1" name="databutton" type="checkbox" data-toggle="toggle"  data-on="Mode<br> Rekomendasi" data-off="Mode<br> Biasa" data-onstyle="success" data-offstyle="danger">
            </div>
        </div>
    </div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--9-col">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp" >
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text" style="color:white"><?php echo $course->lsn_name ?></h2>
                        </div>
                        <div class="mdl-card__supporting-text" >
                            <?php
                            $cnt_lg = array();
                            foreach ($learning_goal as $lg):
                                $cnt_lg[] = $lg->cnt_id;
                            endforeach;

                            foreach ($contents as $content): ?>
                                <ul class="mdl-list" style="margin: 15px;" >
                                    <li class="mdl-list__item" style="background-color: #0d0d0d">
                                         <span class="mdl-list__item-primary-content">
                                              <i class="material-icons mdl-list__item-icon"><?php if ($content->cnt_type == 'Text') echo "file_download"; else if ($content->cnt_type == 'Video') echo "play_circle_filled"; else echo "file_download"; ?></i>
                                             <?php echo $content->cnt_name ?>
                                             <span class="mdl-list__item-text-body">
                                                
                                                <?php
                                                if (in_array($content->cnt_id, $cnt_lg)) {
                                                ?>
                                                    <span class="label label-success" style="margin-left:20px ">Rekomendasi</span>
                                                <?php
                                                }
                                                ?>
                                                
                                             </span>
                                         </span>
                                        <b class="mdl-list__item-secondary-action"
                                           style="margin-right: 50px">
                                            <h4><span class=""><?php echo $content->cnt_type ?></span></h4></b>
                                        <!-- <a href="<?php
                                        if ($content->cnt_type == 'Text') {
                                            $btncl = 1;
                                        } else if ($content->cnt_type == 'Video') {
                                            $btncl = 0;
                                        } else {
                                            $btncl = 2;
                                        } ?>"> -->
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue btnClick" data-loc = "<?php echo site_url('siswa/content/contents/' . $content->cnt_id)?>"
                                                data-log="<?php echo $btncl ?>" data-content4="<?php echo $content->cnt_id ?>">
                                            <i class="material-icons"></i>
                                            Masuk
                                        </button>
                                        <!-- </a> -->
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp trending">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Course</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <ul class="mdl-list">
                                <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons" style="font-size: 30px">today</i>
                                    <span style="margin-left:20px">23/1/2018 16:00 AM </span>
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons" style="font-size: 30px">account_circle</i>
                                    <span style="margin-left:20px"><?php echo $course->usr_firstname . ' ' . $course->usr_lastname ?></span>
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons" style="font-size: 30px">place</i>
                                    <span style="margin-left:20px">Universitas: <?php echo $course->crs_univ ?> </span>
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons" style="font-size: 30px">done</i>
                                    <span style="margin-left:20px">Status: Sedang Diambil</span>
                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp trending">
                        
                    </div>
                </div>
                
            </div>
        </div>
		<div class="mdl-cell mdl-cell--9-col">
		</div>

        <!-- REKOMENDASI LS -->
        <div class="mdl-cell mdl-cell--3-col">
           <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title" style="display: block">
                            <button class="btn-dd" style="float: right;" type="button" data-toggle="collapse"
                                    data-target="#demo2"><i class="fa fa-angle-double-down"></i></button>
                                    <h4 style="color:white">Ada rekomendasi nih untuk kamu</h4>
                                    <hr style="background-color: white;"/>
                        </div>
                        <div id="demo2" class="collapse">
                            <div class="mdl-card__supporting-text">
                                <ul class="demo-list-icon mdl-list">
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">
                                        <span style="margin-right: 25px;"></span>
                                        <i class="material-icons mdl-list__item-icon">label</i>
                                        <a href="<?php echo site_url('siswa/'.$this->session->userdata("dataLS")."/".$lsn_id) ?>"
                                           style="color: white;"><?php echo $this->session->userdata("dataLS");?></a>
                                     </span>
                                            <b class="mdl-list__item-secondary-action" style="margin-right:50px"></b>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</main>
<script type="text/javascript">


    $(document).ready(function () {
        $(".btnClick").click(function () {
            var loc = $(this).data('loc');
            var log = $(this).data('log');
            var content4 = $(this).data('content4');
            $.ajax({
                url: '<?php echo base_url() . 'siswa/Content/countLogContent/' . $content->lsn_id?>' + '/' + log + '/' + content4,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    window.location = loc;
                },
                error: function (res) {
                    alert('Error');
                }
            });

        });
    });
</script>
