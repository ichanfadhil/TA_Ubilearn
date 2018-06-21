<style>
    mark {
        background-color: yellow;
    }
</style>
<main class="mdl-layout__content">
<div class="mdl-grid cover-main">
        <div class="mdl-cell mdl-cell--12-col">
        <h1 style="color:white"><?php echo $course->crs_name ?></h1><br>
        <p style="color:white"><?php echo $course->usr_firstname . ' ' . $course->usr_lastname ?></p>
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
                    

                            foreach ($contents_teks as $content): ?> 
                    <ul class="mdl-list" style="margin: 15px;" >
                        <li class="mdl-list__item" style="background-color: #0d0d0d">
                        <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon"><?php echo "file_download"?></i>
                        <a style="text-decoration:none;" href="<?php echo site_url('siswa/content/contents/' . $content->cnt_id) ?>" ><span style="color:white" style="margin-left:20px"><?php echo $content->cnt_name ?></span></a>
                    </span>
                    <b class="mdl-list__item-secondary-action"
                        style="margin-right: 0px">
                        </b>
                        <a href="<?php echo site_url('siswa/content/contents/35/') ?>" class="btn-floating btn-large waves-effect waves-light blue"><i class="large material-icons test" data-toggle="tooltip" data-placement="top" title="Disini kamu bisa melihat materi berupa video juga loh" style="font-size: 50px;">add_circle</i></a>
                    </li>
                    </ul>
                    <?php endforeach; ?>

                  
                </div>
            </div>
        </div>
    </div>
</div>   
<!-- col active -->
<div class="mdl-cell mdl-cell--3-col">
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="mdl-card mdl-shadow--2dp trending">
            <div class="mdl-card__title" style="display: block">
            <p style="color: white">YUK! Catat disini aja materinya..</p>
            <textarea rows="4" cols="50" style="background-color: white;color:#000;">
                    Material Board
                    </textarea>
                <hr style="background-color: white;"/>
                <p style="color: white">Diskusikan materi belajar ini bersama temanmu..</p>
                <button class="btn-dd" style="float: right;" type="button" data-toggle="collapse"
            data-target="#demo2"><i class="fa fa-angle-double-down"></i></button>
            
            </div>
           
            <div id="demo2" class="collapse">
                <div class="mdl-card__supporting-text">
                <ul class="mdl-list">
    <li class="mdl-list__item">
  
    <p style="color: white">Menuju forum diskusi..</p>
    </li>
    </ul>
                <a href="<?php echo site_url('siswa/list_thread_siswa/46/') ?>" class="btn-floating btn-large waves-effect waves-light red" style="float: right;"><i class="material-icons">chat_bubble_outline</i></a>
               
                </div>
            </div>

        </div>
</div>
</div>
</div>

<div class="mdl-cell mdl-cell--5-col">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending" >
                    <div class="mdl-card__title">
                        <h5 style="color:white">Ingin lebih memahami materi tree? Ikuti langkah dibawah ini</h5><i class="material-icons">arrow_downward</i>
                    </div>
                <div class="mdl-card__supporting-text" >
                <ul class="mdl-list">
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <a style="text-decoration:none;" href="<?php echo site_url('siswa/result/13/') ?>" ><span style="color:white" style="margin-left:20px">1. Mengikuti pretest yang telah disediakan</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="#" ><span style="color:white" style="margin-left:20px">2. Membaca materi yang telah disediakan</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/list_thread_siswa/46/') ?>" ><span style="color:white" style="margin-left:20px">3. Mengerjakan latihan soal yang telah disediakan</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/result/13/') ?>" ><span style="color:white" style="margin-left:20px">4. Hadir dalam forum diskusi</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/result/15/') ?>" ><span style="color:white" style="margin-left:20px">5. Mengerjakan kuis yang telah disediakan</span></a>
                </span>
                </li>
            </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mdl-cell mdl-cell--4-col">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp trending">
                        <div class="mdl-card__title" style="display: block">
								<h6 style="color:white">Silahkan menggunakan langkah sendiri untuk memamahami materi tree.</h6>
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
                <hr style="background-color: white;"/>
            </div>
           
            <div class="mdl-card__supporting-text">
                <ul class="mdl-list">
                    <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons" style="font-size: 30px">today</i>
                        <span style="margin-left:20px">28/4/2018 16:00 AM </span>
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
                        <span style="margin-left:20px">Universitas:<?php echo $course->crs_univ ?></span>
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
</div>

</div>

</main>