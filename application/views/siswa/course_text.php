
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

<main class="mdl-layout__content">
<div class="mdl-cell mdl-cell--middle mdl-cell--12-col mdl-cell--12-col-phone">
    
    <div class="kana-mid">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 style="align:center" class="mdl-card__title-text"><?php echo strip_tags($kontent->cnt_name) ?></h2>
            </div>
            <div class="mdl-card__supporting-text">
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

