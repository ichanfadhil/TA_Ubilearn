
<style>

.kana-mid {
    margin: auto;
    width: 70%;
    padding: 16px;
}

.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('https://i.ytimg.com/vi/kWDwUzyF22A/maxresdefault.jpg') center / cover;
}

img {
    max-width: 70%;
}

blockquote{
  font-size: 1.4em;
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
  content: "\f0eb";
  font-size: 1.4em;
  color:#FFF;
  position: absolute;
  left: 10px;
  top: 0px;
}

blockquote::after{
    font-family:FontAwesome;
  content: "\f0eb";
  font-size: 1.4em;
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
    $bg_content = array(
    "http://localhost/TA_Uler/res/assets/images/konten/konten.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten2.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten3.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten4.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten5.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten6.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten7.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten8.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten9.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten10.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten11.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten12.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten13.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten14.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten15.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten16.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten17.png",
    "http://localhost/TA_Uler/res/assets/images/konten/konten18.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten19.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten21.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten22.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten23.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten24.png",
    "http://localhost/TA_Uler/res/assets/images/konten/konten25.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten26.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-graph.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-graph1.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-rekursif.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-tree.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-tree2.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-tree3.jpg",
    "http://localhost/TA_Uler/res/assets/images/konten/konten-tree4.jpg"
);

?>

<main class="mdl-layout__content">
<div class="mdl-cell mdl-cell--middle mdl-cell--12-col mdl-cell--12-col-phone">
    
    <div class="kana-mid">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            
            <div class="mdl-card__title" style="background: url(<?php echo $bg_content[array_rand($bg_content)] ?>) center / cover;">
                <h2 style="align:center" class="mdl-card__title-text"><?php echo strip_tags($kontent->cnt_name) ?></h2>
            </div>

            <div class="mdl-card__supporting-text">
            <audio controls data-toggle="tooltip" data-placement="right" title="Klik lalu pahami materinya." style="font-size: 35px; color: white;">>
                <source src="<?php echo base_url();?>res/assets/<?php echo $kontent->cnt_source;?>" type="audio/ogg">
                <source src="<?php echo base_url();?>res/assets/<?php echo $kontent->cnt_source;?>" type="audio/mpeg">
                cek audio
            </audio>
                <blockquote>
                Lelah dalam belajar itu biasa, tapi jangan menyerah dalam belajar. Orang yang tidak punya cita-cita bagaikan burung tanpa sayap.
                </blockquote>
                
                <?php echo $kontent->cnt_desc ?>
                
                <blockquote>
                Kamu sangat tidak disarankan untuk belajar saat ini, silakan istirahat atau melakukan kegiatan lain.
                </blockquote>
            </div>
            
        </div>
    </div>

    <!-- <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone" >
        <embed src="<?php echo base_url();?>res/assets/content/<?php echo $kontent->cnt_source;?>#toolbar=0&navpanes=0&scrollbar=0" style="width: 100%; height: 500px;">
    </div> -->
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

