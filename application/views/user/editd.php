    <!-- Begin Page Content -->
    <div class="container-fluid" id="main-user-data">
        <div class="row">
            <div class="col-lg-10 mx-auto">
            
            <!-- content -->
                    <!-- Illustrations -->
                <div class="card shadow mb-12">
                    <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-success"><?= $title; ?></h4>
                </div>
                    <!-- <div class="card-body">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?> -->

                <!-- content -->
                <div class="text-center">
				<!-- <h2><b>Pesanan Anda Telah Selesai Check History Untuk ticket</b></h2> -->
                <p> </p>
                <?= form_open_multipart('user/editd'); ?>
                <!-- <?= base_url('assets/img/profile/') . $user['image']; ?> -->
                <div class="profile-photo-container">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="profile-photo" id="profilePhoto" alt="Profile Photo">
                    <input type="file" class="profile-photo-input" id="image" name="image">
                    <div class="change-photo-text">Ubah Foto</div>
                </div>
                <div class="profile-form">
                    <input type="text" id="name" name="name" placeholder="Nama Anda" value="<?= $user['name']; ?>"><br>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    <input type="text" id="email" placeholder="Email Anda" value="<?= $user['email']; ?>">
                </div>
                <button type="submit" class="btn btn-success">Edit Profile</button>
                </form>
                    <!-- <a type="button" id="finalOrderProses" class="btn btn-success" ><b style="color: white;">edit profile</b></a> -->
				<h5 class="card-title"></h5>
            </div>

        
                <!-- end content -->

                    
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<style>
        .profile-photo-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }
        .profile-photo {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-photo-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            border-radius: 50%;
        }
        .change-photo-text {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            color: white;
            background-color: rgba(128, 128, 128, 0.5);
            padding: 5px;
            border-bottom-left-radius: 75px;
            border-bottom-right-radius: 75px;
            display: none;
        }
        .profile-photo-container:hover .change-photo-text {
            display: block;
        }
        .profile-form {
            text-align: center;
            margin-top: 20px;
        }
        .profile-form input {
            margin-bottom: 10px;
            width: 80%;
            padding: 5px;
        }
    </style>