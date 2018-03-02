<main class="mdl-layout__content">
    <div class="col-sm-10 cover-main">
        <div class="mdl-grid  ">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone ">
                <div class="">
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-sm-10 " >
        <div class="mdl-grid">
            <!-- FLASH DATA -->
            <?php if ($this->session->flashdata('data_tersimpan') == TRUE): ?>
                <div role="alert"  class="alert alert-success alert-dismissible fade in mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                    </button>
                    <p><?php echo $this->session->flashdata('data_tersimpan')?></p>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('data_lesson') == TRUE): ?>
            <div role="alert"  class="alert alert-success alert-dismissible fade in mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                </button>
                <p><?php echo $this->session->flashdata('data_lesson')?></p>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('ass_delete_success') == TRUE): ?>
                    <div role="alert"  class="alert alert-success alert-dismissible fade in mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                        <p><?php echo $this->session->flashdata('ass_delete_success')?></p>
                    </div>
            <?php endif; ?>
        <!-- START LESSON LIST  -->


            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" style="display: block">
                        <div>
                            <a href="<?php echo site_url('instruktur/add_lesson/'.$id)?>">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue">
                                    Tambah
                                </button>
                            </a>
                            <button class="btn-dd" style="float: right;" type="button" data-toggle="collapse" data-target="#demo"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col">
                                <div id="icon">
                                    <img src="<?php echo base_url();?>res/assets/images/lesson.png">
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--11-col">
                                <h2 class="mdl-card__title-text">Lesson</h2><hr style="color: white;" >
                                <p style="color: white;">Understand to growing need for better .... ....</p>
                            </div>
                        </div>
                    </div>
                    <div id="demo" class="collapse">
                        <div class="mdl-card__supporting-text">
                            <ul class="demo-list-icon mdl-list">
                                <?php
                                $num= 1;
                                foreach ($datalesen as $lesen) : ?>
                                    <li class="mdl-list__item">
                                        <span class="mdl-list__item-primary-content">
                                            <span style="margin-right: 25px;"><?php echo $num++?> </span>
                                            <i class="material-icons mdl-list__item-icon">label</i>
                                            <?php echo 'Materi - '.$lesen->lsn_name; ?>
                                        </span>
                                        <b class="mdl-list__item-secondary-action" style="margin-right:50px"></b>
                                        <a href="<?php echo site_url('instruktur/content/'.$lesen->lsn_id)?>">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue" style="margin:2px;">
                                            <i class="material-icons">add</i>
                                            Masuk
                                            </button>
                                        </a>
                                        <a href="<?php echo site_url('instruktur/edit_lesson/'.$lesen->lsn_id)?>" >
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-yellow" style="margin:2px;">
                                            <i class="material-icons">drafts</i>
                                            Edit
                                            </button>
                                        </a>
                                        <a href="<?php echo site_url('instruktur/delete_lesson/'.$lesen->lsn_id)?>" >
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-red" style="margin:2px;" onclick="return confirm('Anda yakin untuk menghapus?');">
                                            <i class="material-icons">delete</i>
                                            Hapus
                                            </button>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" style="display: block">
                        <div>
                            <a href="<?php echo site_url('instruktur/add_assesment/'.$id)?>">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue">
                                    Tambah
                                </button>
                            </a>
                            <button class="btn-dd" style="float: right;" type="button" data-toggle="collapse" data-target="#demo2"><i class="fa fa-bars"></i></button>
                        </div>                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col">
                                <div id="icon">
                                    <img src="<?php echo base_url();?>res/assets/images/assesment.png">
                                </div>                            </div>
                            <div class="mdl-cell mdl-cell--11-col">
                                <h2 class="mdl-card__title-text">Assesment</h2><hr style="color: white" />
                                <p style="color: white">Understand to growing need for better .... ....</p>
                            </div>
                        </div>
                    </div>
                    <div id="demo2" class="collapse">
                        <div class="mdl-card__supporting-text">
                            <ul class="demo-list-icon mdl-list">
                                <?php
                                $num= 1;
                                $i = 0;
                                foreach ($listAss as $ass) : ?>
                                    <li class="mdl-list__item">
                                        <span class="mdl-list__item-primary-content">
                                            <span style="margin-right: 25px;"><?php echo $num++?> </span>
                                            <i class="material-icons mdl-list__item-icon mdl-badge mdl-badge--overlap" data-badge="<?php echo $jumSoal[$i] ?>" title="Jumlah Soal">description</i>
                                            <?php echo $ass->ass_tipe.' - '.$ass->ass_name; ?>
                                        </span>
                                        <b class="mdl-list__item-secondary-action" style="margin-right:50px"></b>
                                        <a href="<?php echo site_url('instruktur/edit_assesment/'.$ass->ass_id)?>" >
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-yellow" style="margin:2px;">
                                            <i class="material-icons">drafts</i>
                                            Edit
                                            </button>
                                        </a>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-red" style="margin:2px;" onclick="deleteAss(<?php echo $ass->ass_id ?>)">
                                            <i class="material-icons">delete</i>
                                            Hapus
                                        </button>

                                    </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" style="display: block">
                        <div>
                            <a href="<?php echo site_url('instruktur/add_assignment/'.$id)?>">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue">
                                    Tambah
                                </button>
                            </a>
                            <button class="btn-dd" style="float: right;" type="button" data-toggle="collapse" data-target="#demo3"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col">
                                <div id="icon">
                                    <img src="<?php echo base_url();?>res/assets/images/assignment.png">
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--11-col">
                                <h2 class="mdl-card__title-text">Assignment</h2><hr style="color: white" />
                                <p style="color: white">Understand to growing need for better .... ....</p>
                            </div>
                        </div>
                    </div>
                    <div id="demo3" class="collapse">
                        <div class="mdl-card__supporting-text">
                            <ul class="demo-list-icon mdl-list">
                                <?php
                                $num= 1;
                                foreach ($dataasing as $asing) : ?>
                                    <li class="mdl-list__item">
                                          <span class="mdl-list__item-primary-content">
                                              <span style="margin-right: 25px;"><?php echo $num++?> </span>
                                              <i class="material-icons mdl-list__item-icon">label</i>
                                              <?php echo 'Materi - '.$asing->asg_name ?>
                                      </span>
                                        <b class="mdl-list__item-secondary-action" style="margin-right:50px"></b>
                                        <a href="<?php echo site_url('instruktur/content/'.$asing->asg_id)?>">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue" style="margin:2px;" >
                                            <i class="material-icons">add</i>
                                            Masuk
                                            </button>
                                        </a>
                                        <a href="<?php echo site_url('instruktur/edit_assignment/'.$asing->asg_id)?>" >
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-yellow" style="margin:2px;">
                                            <i class="material-icons">drafts</i>
                                            Edit
                                            </button>
                                        </a>
                                        <a href="<?php echo site_url('instruktur/delete_assignment/'.$asing->asg_id)?>" >
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-red" style="margin:2px;" onclick="return confirm('Anda yakin untuk menghapus?');">
                                            <i class="material-icons">delete</i>
                                            Hapus
                                            </button>
                                        </a>

                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>

        <div class="sidenav">
            <ul class="demo-list-item mdl-list">
                <li class="mdl-list__item">
                    Informasi Course
                </li>
                <hr>
                <li class="mdl-list__item">
                    Course : <?php echo $dataInstruktur->crs_name?>
                </li>
                <li class="mdl-list__item">
                    Instruktur : <?php echo $dataInstruktur->usr_firstname?> <?php echo $dataInstruktur->usr_lastname?>
                </li>
                <li class="mdl-list__item">
                    Jumlah siswa:
                </li>
                <li class="mdl-list__item">
                    Jumlah lesson: <?php echo $jumlah?>
                </li>
            </ul>

            <hr>
            <h4 style="color: white;margin-left: 10px;">Siswa dalam Course :</h4>
            <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <span style="margin-right: 25px;">IKI</span>
                    </span>
                </li>
            </ul>

        </div>
</main>
<script type="text/javascript">
  function deleteAss(ass_id){
      if(confirm("Anda yakin ingin menghapusnya ?")){
          window.location.href = '<?php echo base_url().'instruktur/Assesment/delete_assesment/'?>'+ass_id ;
      }
      else{
        //Do Nothing
      }
    }
</script>
