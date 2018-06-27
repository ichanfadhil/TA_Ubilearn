<style>
    mark {
        background-color: yellow;
    }
    blockquote{
  font-size: 1.1em;
  width:100%;
  margin:16px auto;
  font-family:Roboto;
  font-style:italic;
  color: #FFF;
  padding:1.2em 30px 1.2em 48px;
  border-left:8px solid #FFF ;
  border-right:8px solid #FFF ;
  line-height:1.6;
  position: relative;
}

blockquote::before{
  font-family:FontAwesome;
  content: "\f10e";
  font-size: 1.1em;
  color:#FFF;
  position: absolute;
  left: 10px;
  top: 0px;
}

blockquote::after{
    font-family:FontAwesome;
  content: "\f10e";
  font-size: 1.1em;
  color:#FFF;
  position: absolute;
  right: 10px;
  top: 0px;
}

blockquote span{
  display:block;
  color:#333333;
  font-style: normal;
  font-weight: bold;
  margin-top:1em;
}
</style>
<?php
$var  =  $course->lsn_id;

function get_text_content($type, $name) {
    $euy = M_Course_Content::select('cnt_id', 'cnt_name', 'cnt_type')
                    ->where('cnt_name','=',$name)
                    ->where('cnt_type','=',$type)->first();

    return $euy;
}
?>
    <script>
    $(function() {
    $('#anying').change(function() {
        window.location.href = "<?php echo site_url("siswa/materi/".$var); ?>";
    })
  })
    </script>
<main class="mdl-layout__content">
<div class="mdl-grid" style="align:center;">
        <div class="mdl-cell mdl-cell--12-col">
        <h1 style="color:white; text-align:center;"><?php echo $course->crs_name ?></h1><br>
        <p style="color:white; text-align:center;"><?php echo $course->usr_firstname . ' ' . $course->usr_lastname ?></p>
        <div style="text-align:center">
        <input id="anying" type="checkbox" checked data-toggle="toggle" data-on="Mode <br> Rekomendasi" data-off="Mode <br> biasa" data-onstyle="success" data-offstyle="danger">
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
                            foreach ($contents_video as $content): ?>    
                    <ul class="mdl-list" style="margin: 15px;" >
                        <li class="mdl-list__item" style="background-color: #0d0d0d">
                        <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon" style="font-size: 30px; color: white;"><?php echo "play_circle_filled"?></i>
                        <a href="<?php echo site_url('siswa/content/contents/' . $content->cnt_id)?>">
                       <img src="<?php echo "https://img.youtube.com/vi/".substr($content->cnt_source,32)."/hqdefault.jpg" ?>" align="center" alt="contoh" style="width: 1000px; height: 100px;">
                       </a>
                    &nbsp; <?php echo $content->cnt_name ?>
                    
                    </span>
                    <b class="mdl-list__item-secondary-action"
                        style="margin-right: 0px">
                        </b>
                        <a href="<?php echo site_url('siswa/content/contents/' . get_text_content("Text", $content->cnt_name)->cnt_id); ?>" class="btn-floating btn-large waves-effect waves-light blue"><i class="large material-icons test" data-toggle="tooltip" data-placement="top" title="Disini kamu bisa melihat materi berupa teks juga loh" style="font-size: 40px; color: white;">text_fields</i></a>
                    </li>
                    </ul>
                    <?php endforeach; ?>
                    <?php
foreach ($contents_example as $content): ?>    
                <ul class="mdl-list" style="margin: 15px;" >
                    <li class="mdl-list__item" style="background-color: #0d0d0d">
                    <span class="mdl-list__item-primary-content">
                    <a href="<?php echo site_url('siswa/content/contents/' . $content->cnt_id)?>">
                  
                    <i class="material-icons mdl-list__item-icon" style="font-size: 30px; color: white;"><?php echo "attachment"?></i>   
                  
                   </a>
                <span class="mdl-list__item-primary-content">
                    <a style="text-decoration:none;" href="<?php echo site_url('siswa/content/contents/' . $content->cnt_id) ?>" ><span style="color:white" style="margin-left:10px; margin-bottom:10px">[ EXAMPLE ]&nbsp;&nbsp;<?php echo $content->cnt_name ?></span></a>
                </span>
                </span>
                </li>
                </ul>
                <?php endforeach; ?>

<div class="mdl-grid">
<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--3-col-tablet mdl-cell--8-col-phone">
</div>
            <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--6-col-tablet mdl-cell--8-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending" >
                    <div class="mdl-card__title">
                        <h5 style="color:white">Ada latihan soal menarik buat kamu nih</h5>
                        <button class="btn-dd" type="button" data-toggle="collapse"
            data-target="#demo4" style="
    margin-left: 150px;"><i class="fa fa-angle-double-down" ></i></button>
                    </div>
                    <div id="demo4" class="collapse">
                <div class="mdl-card__supporting-text" >
                <ul class="mdl-list">
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <a style="text-decoration:none;" href="<?php echo site_url('siswa/sensing1') ?>" ><span style="color:white" style="margin-left:20px">Latihan Soal 1</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/sensing2') ?>" ><span style="color:white" style="margin-left:20px">Latihan Soal 2</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/sensing3') ?>" ><span style="color:white" style="margin-left:20px">Latihan Soal 3</span></a>
                </span>
                </li>
                
               
            </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--3-col-tablet mdl-cell--8-col-phone">
</div>


                </div>
            </div>
        </div>
    </div>
</div>   
<!-- col active -->
<div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title" style="display: block">
                        <a href="<?php echo site_url('siswa/list_thread_siswa/'.$forum1->cfr_id) ?>" class="btn-floating btn-large waves-effect waves-light red" style="float: right;"><i class="material-icons" style="color: white;">chat_bubble_outline</i></a>
                            <h1 class="mdl-card__title-text">YUK !</h1>
                            <p style="color: white">Diskusikan materi belajar ini bersama temanmu..</p>
                            <hr style="background-color: white;"/>
                        <p style="color: white">Kamu juga bisa membuat catetan sendiri loh disini</p>
                        <button class="btn-dd" style="float: right;" type="button" data-toggle="collapse"
                        data-target="#demo2"><i class="fa fa-angle-double-down"></i></button>
                        
                        </div>
                        
                        <div id="demo2" class="collapse">
                        <div class="mdl-card__supporting-text">
                        <p style="color: white">YUK! Catat disini aja materinya..</p>
            <center><textarea rows="4" cols="55" style="background-color: white;color:#000;">
                    .....
            </textarea></center>
                <div class="form-group">
               <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-white">Simpan Catatan</button>
                </div>
                        </div>
</div>
                    </div>
    </div>
	</div>
	</div>

    <div class="mdl-cell mdl-cell--5-col">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
            <div class="mdl-card mdl-shadow--2dp trending">
                <div class="mdl-card__title" style="display: block">
                <blockquote><center>
                Silahkan menggunakan langkah sendiri untuk memamahami materi tree.
                </blockquote></center>               
                 </div>
            </div>
        </div>
    </div>
</div>
 
	
<div class="mdl-cell mdl-cell--4-col">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending" >
                    <div class="mdl-card__title">
                        <h5 style="color:white">Ingin lebih memahami materi tree? Ikuti langkah dibawah ini</h5>
                        <a style="float: right;" data-toggle="collapse"
                        data-target="#demo3"><i class="material-icons" style="color: white;">arrow_downward</i></a>
                                    <hr style="background-color: white;"/>
                    </div>
                    <div id="demo3" class="collapse">
                <div class="mdl-card__supporting-text" >
                <ul class="mdl-list">
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <a style="text-decoration:none;" href="<?php echo site_url('siswa/assesment_info/13/') ?>" ><span style="color:white" style="margin-left:20px">1. Mengikuti pretest yang telah disediakan</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="#" ><span style="color:white" style="margin-left:20px">2. Membaca materi yang telah disediakan</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/assesment_info/'. $latihan->ass_id) ?>" ><span style="color:white" style="margin-left:20px">3. Mengerjakan latihan soal yang telah disediakan</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/list_thread_siswa/'.$forum1->cfr_id) ?>" ><span style="color:white" style="margin-left:20px">4. Hadir dalam forum diskusi</span></a>
                </span>
                </li>
                <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/assesment_info/'. $kuis->ass_id) ?>" ><span style="color:white" style="margin-left:20px">5. Mengerjakan kuis yang telah disediakan</span></a>
                </span>
                </li>
            </ul>
                </div>
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