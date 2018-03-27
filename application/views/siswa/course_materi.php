<main class="mdl-layout__content">
    <div class="mdl-grid cover-main">
        <div class="mdl-cell mdl-cell--12-col">
            <h1 style="color:white"><?php echo $course->crs_name ?></h1><br>
            <p style="color:white"><?php echo $course->usr_firstname . ' ' . $course->usr_lastname ?></p>
        </div>
    </div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--9-col">
            <div class="mdl-card">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text" style="color:white"><?php echo $course->lsn_name ?></h2>
                </div>
                <?php foreach ($contents as $content): ?>
                    <ul class="mdl-list" style="margin: 15px;">
                        <li class="mdl-list__item" style="background-color: #0d0d0d">
								 <span class="mdl-list__item-primary-content">
                                    <span style="margin-right: 25px;"></span>
                                    <i class="material-icons mdl-list__item-icon"><?php if ($content->cnt_type == 'Text') echo "file_download"; else echo "play_circle_filled" ?></i>
                                     <?php echo $content->cnt_name ?>
                                </span>
                            <div class="mdl-layout-spacer"></div>
                            <b class="mdl-list__item-secondary-action"
                               style="margin-right:50px"><?php echo $content->cnt_type ?></b>
                            <!-- <a href="<?php 
                            if ($content->cnt_type == 'Text') {
                                echo site_url('res/assets/content/' . $content->cnt_source);
                                
                            }
                            else { 
                                echo site_url('siswa/content/video/' . $content->cnt_id);
                            } ?>"> -->
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue btnClick" <?php if ($content->cnt_type == 'Text') echo 'data-loc = '.site_url('res/assets/content/' . $content->cnt_source); else echo 'data-loc = '.site_url('siswa/content/video/' . $content->cnt_id); ?> >
                                    <i class="material-icons"></i>
                                    <?php if ($content->cnt_type == 'Text') echo "Unduh"; else echo "Masuk"; ?>
                                </button>
                            <!-- </a> -->
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--3-col">
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
    </div>
</main>
<script type="text/javascript">


    $(document).ready(function(){
        $(".btnClick").click(function(){
            var loc = $(this).data('loc');
            $.ajax({
                url: '<?php echo base_url().'siswa/Content/countLogContent/'.$content->lsn_id ?>',
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                success: function(res){
                    window.location = loc;
                },
                error: function(res){
                    alert('Error');
                }
            });
            
        });
    });
</script>
