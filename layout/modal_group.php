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
                <h3 class="c-font-24 c-font-sbold">Create New Discussion Group</h3>
                <form action="groupController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="create-group" class="">Your Group Name</label>
                        <input type="text" class="form-control input-lg c-square" id="topic_discussion" placeholder="Group Name" name="topic_discussion" required=""> 
                        <input type="hidden" name="act" value="create_group">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-group" id="create-group">Create</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL CREATE GROUP -->

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
                                            <button class="btn btn-default">Invite</button>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT u.id, u.nama, u.username FROM user u INNER JOIN anggota a on u.id=a.user_id WHERE a.grup_id=$group_id") or die(mysqli_error());
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <th style="text-align: center;"><?php echo $row['id'] ?></th>
                                        <td style="text-align: center;"><?php echo $row['nama'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['username'] ?></td>
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
