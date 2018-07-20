<!-- MODAL CREATE GROUP -->
<div class="modal fade c-content-login-form" id="create-group" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Buat Grup Diskusi Baru</h3>
                <form action="groupController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="create-group" class="">Nama Grup</label>
                        <input type="text" class="form-control input-lg c-square" id="topic_discussion" placeholder="Group Name" name="topic_discussion" required=""> 
                        <input type="hidden" name="act" value="create_group">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-group" id="create-group">Buat</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL CREATE GROUP -->

<!-- MODAL DISBAND GROUP -->
<div class="modal fade c-content-login-form" id="delete-group" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin membubarkan grup ini?</h3>
                
                <button  data-dismiss="modal"  class="btn btn-danger" style="margin-top: 2%;">Batal</button>
                <form action="groupController.php" method="POST" style="display: inline-block;">
                    <input type="hidden" name="act" value="delete_group">
                    <input type="hidden" name="grup_id" value="<?php echo $group_id ?>">
                    <button class="btn btn-info" style="vertical-align: top !important; margin-top: 0;"> Bubarkan</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- END MODAL DISBAND GROUP -->

<!-- MODAL INVITE MEMBER -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="invite-member" role="dialog" style="margin-top: 5%;">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example" class="table table-hover table-bordered" width="100%;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">User ID</th>
                            <th style="text-align: center;">Nama User</th>
                            <th style="text-align: center;">Username</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM user WHERE id NOT IN(SELECT a.user_id FROM grup g INNER JOIN anggota a on a.grup_id=g.id WHERE g.id = $group_id)") or die(mysqli_error());
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <th style="text-align: center;"><?php echo $row['id'] ?></th>
                                    <td style="text-align: center;"><?php echo $row['nama'] ?></td>
                                    <td style="text-align: center;"><?php echo $row['username'] ?></td>
                                    <td style="text-align: center;">
                                        <form action="groupController.php" method="POST">
                                            <input type="hidden" value="invite_member" name="act">
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="member_id">
                                            <input type="hidden" value="<?php echo $group_id; ?>" name="group_id">
                                            <button class="btn btn-default">Undang</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL INVITE MEMBER -->

    <!-- MODAL SHOW MEMBER -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="show-member" role="dialog" style="margin-top: 5%;">
        <div class="modal-dialog">
            <div class="modal-content c-square">
                <div class="modal-header c-no-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-hover table-bordered" width="100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">User ID</th>
                                <th style="text-align: center;">Nama User</th>
                                <th style="text-align: center;">Username</th>
                                <?php 
                                $sql = "SELECT * FROM user u INNER JOIN grup g on u.id = g.user_id WHERE u.id = $user_id AND g.id=$group_id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) { ?>
                                <th style="text-align: center;">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT u.id, u.nama, u.username FROM user u INNER JOIN anggota a on u.id=a.user_id WHERE a.grup_id=$group_id AND u.id != $user_id") or die(mysqli_error());
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <th style="text-align: center;"><?php echo $row['id'] ?></th>
                                        <td style="text-align: center;"><?php echo $row['nama'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['username'] ?></td>
                                        <?php 
                                        $sql = "SELECT * FROM user u INNER JOIN grup g on u.id = g.user_id WHERE u.id = $user_id AND g.id=$group_id";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) { ?>
                                        <td style="text-align: center;">
                                            <form action="groupController.php" method="POST">
                                                <input type="hidden" value="kick_member" name="act">
                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="member_id">
                                                <input type="hidden" value="<?php echo $group_id; ?>" name="group_id">
                                                <button class="btn btn-danger">Kick</button>
                                            </form>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL SHOW MEMBER -->
