<?php 
    include_once 'include/header.php';   
    require_once 'class/Dosen.php';
    require_once 'class/PKM.php';
    $obj_dosen = new Dosen();
    $obj_pkm = new PKM();
    $rs = $obj_dosen->getALL();

    $_idedit = $_GET['id'];
    
    if(!empty($_idedit)){
        $data = $obj_pkm->findByID($_idedit);
    }else{
        $data = [] ;
    }
?>

    <div class="nk-main">
        <div class="container">
            <div class="nk-portfolio-single">

                <div class="nk-gap-4 mb-14"></div>
                <h1 class="nk-portfolio-title display-4">Input PKM</h1>
                <div class="row vertical-gap">
                
                    <div class="col-lg-12">
                        <!-- START: Form -->
                        <form method="POST" action="proses_pkm.php" class="nk-form nk-form-ajax">    
                        
                            <div class="row vertical-gap">
                                <div class="col-md-6">
                                    <?php if (empty($_idedit)){ ?>
                                        <input type="number" class="form-control required" name="semester" placeholder="Masukkan Semester..." required>
                                    <?php } else { ?>
                                        <input type="number" class="form-control required" name="semester" placeholder="Masukkan Semester..." required value="<?php echo $data['semester']?>">
                                    <?php } ?>                                      
                                </div>
                                <div class="col-md-6">                                    
                                    <?php if (empty($_idedit)){ ?>
                                        <input type="text" class="form-control required" name="judul" placeholder="Masukkan Judul..." required>
                                    <?php } else { ?>
                                        <input type="text" class="form-control required" name="judul" placeholder="Masukkan Judul..." required value="<?php echo $data['judul']?>">
                                    <?php } ?> 
                                </div>
                            </div>                            

                            <div class="nk-gap-1"></div>
                            <div class="row vertical-gap">
                                <div class="col-md-6">                                    
                                    <?php if (empty($_idedit)){ ?>
                                        <input type="text" class="form-control required" name="lokasi" placeholder="Masukkan Lokasi..." required>
                                    <?php } else { ?>                                
                                        <input type="text" class="form-control required" name="lokasi" placeholder="Masukkan Lokasi..." required value="<?php echo $data['lokasi']?>">                                        
                                    <?php } ?> 
                                </div>
                                <div class="col-md-6">                                                                       
                                    <?php if (empty($_idedit)){ ?>
                                        <input type="number" class="form-control required" name="sks" placeholder="Masukkan SKS..." required>
                                    <?php } else { ?>                                
                                        <input type="number" class="form-control required" name="sks" placeholder="Masukkan SKS..." required value="<?php echo $data['sks']?>">                                        
                                    <?php } ?> 
                                </div>
                            </div>                        

                            <div class="nk-gap-1"></div>
                            <?php if (empty($_idedit)){ ?>
                                <select class="form-control required" name="nidn" required>
                                    <option value="">Pilih Nama Dosen</option>
                                    <?php
                                        foreach($rs as $row) {
                                            echo '<option value="'.$row['nidn'].'">'.$row['nama'].'</option>';
                                        }
                                    ?>
                                </select>
                            <?php } else { ?>                                
                                <select class="form-control required" name="nidn" required>
                                    <option value="">Pilih Nama Dosen</option>
                                    <?php
                                        foreach($rs as $row) {                                            
                                            if($row['nidn'] == $data['nidn']){
                                                echo '<option value="'.$row['nidn'].'" selected>'.$row['nama'].'</option>';
                                            }
                                            else{
                                                echo '<option value="'.$row['nidn'].'">'.$row['nama'].'</option>';
                                            }                                            
                                        }
                                    ?>
                                </select>
                            <?php } ?> 
                            
                            <div class="nk-gap-1"></div>
                            <div class="nk-form-response-success"></div>
                            <div class="nk-form-response-error"></div>
                            <?php if (empty($_idedit)){ ?>
                                <input type="submit" class="nk-btn" name="proses" value="Simpan">
                            <?php } else { ?>         
                                <input type="hidden" name="idedit" value="<?php echo $_idedit?>">                       
                                <input type="submit" class="nk-btn" name="proses" value="Update">
                                <input type="submit" class="nk-btn" name="proses" value="Hapus">
                            <?php } ?>                              
                        </form>
                        <!-- END: Form -->
                    </div>

                </div>
                <div class="nk-gap-4 mt-14"></div>

            </div>
        </div>

<?php include_once 'include/footer.php'; ?>  