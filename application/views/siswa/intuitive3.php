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
</style>
<main class="mdl-layout__content">
    <div class="mdl-cell mdl-cell--middle mdl-cell--12-col mdl-cell--12-col-phone">
    
    </div>
    <div class=" kana-mid " >
        <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
          <div class="mdl-card mdl-shadow--2dp">
          </div>
        </div>
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
          <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title" style="display: block">
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <h2 class="mdl-card__title-text">Latihan Yuk!</h2>
                    <span class="text-color--gray">Latihan soal ini berupa pengetahuan seputar materi tree loh..</span>
                    <hr style="color: white" />
                    <p style="color: white">Aku berjalan dari cabang kiri, lalu aku mengunjungi cabang kanan, lalu aku mencetak isi simpul yang dikunjungi ( simpul akar ). Apakah aku ini?</p>
                </div>
              </div>
            </div>
        </div>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
          <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__supporting-text" style="display: block">
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                <p>
                    <input type="radio" name="jawaban1" id="jawaban1" value="">
                    <label for=""> OutOrder</label>
                </p>
                
                <p>
                    <input type="radio" name="jawaban1" id="jawaban1" value="">
                    <label for="">InOrder</label>
                </p>
                <!-- //jawaban bener -->
                <p>
                    <input type="radio" name="jawaban1" id="jawaban1" value="">
                    <label for="">PostOrder</label>
                </p>
                <p>
                    <input type="radio" name="jawaban1" id="jawaban1" value="">
                    <label for="">PreOrder</label>
                </p>
                <hr style="color: white" />
                <ul class="mdl-list pull-left">
                <a style="text-decoration:none;" href="<?php echo site_url('siswa/'.$this->session->userdata("dataLS")."/".$lsn_id) ?>" >

                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue" data-upgraded=",MaterialButton,MaterialRipple">
                                Simpan Jawaban
                            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 189.298px; height: 189.298px; transform: translate(-50%, -50%) translate(41px, 13px);"></span></span></button></a>
                       
                    </ul>
                   
                </div>
              </div>
            </div>
          </div>

    </div>

    
</main>

