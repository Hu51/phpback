<div class="col-md-9">
    <small>
        <ol class="breadcrumb">
            <li><a href="<?= base_url(); ?>">Feedback</a></li>
            <li><?= $lang['label_profiles']; ?></li>
            <li class="active"><?= $user->name; ?></li>
        </ol>
    </small>
    <h5><?= $user->name; ?><?php if ($user->isadmin): ?><span class="label label-danger" style="margin-left:7px;">Admin</span> <?php endif; ?></h5>
    <?php if (isset($_SESSION['phpback_userid']) && $user->id == $_SESSION['phpback_userid']): ?>
        <div><?= $user->votes; ?><?= $lang['text_votes_left']; ?></div>
    <?php elseif (isset($_SESSION['phpback_isadmin']) && $_SESSION['phpback_isadmin'] > 1): ?>
        <a href="<?= base_url() . 'admin/users/' . $user->id; ?>" target="_blank">
            <button type="submit" class="btn btn-danger btn-sm" style="width:130px"><?= $lang['label_ban_user']; ?></button>
        </a>
    <?php endif; ?>
    <hr>
    <?php if (isset($_SESSION['phpback_userid']) && $user->id == $_SESSION['phpback_userid']): ?>
        <div id="account settings">
            <?php if ($error > 0): ?>
                <p class="bg-danger" style="padding-left:20px;padding-top:5px;padding-bottom:5px;">
                    <?php if ($error == 1) echo $lang['error_passwords']; ?>
                    <?php if ($error == 2) echo $lang['error_password_old']; ?>
                    <?php if ($error == 3) echo $lang['error_password']; ?>
                </p>
            <?php endif; ?>
            <small>
                <ul class="nav nav-tabs">
                    <li id="table4" class="active"><a onclick="showtable4('resetvotestable','table4');"><?= $lang['label_reset_votes']; ?></a></li>
                    <li id="table5"><a onclick="showtable4('changepasswordtable','table5');"><?= $lang['label_change_password']; ?></a></li>
                    <?php if ($_SESSION['phpback_isadmin'] >= 1) : ?>
                        <li><a href="<?= base_url() . 'admin/'; ?>" target="_blank">ADMIN PANEL</a></li>
                    <?php endif; ?>
                </ul>
                <table id="resetvotestable" class="table table-striped">
                    <thead>
                    <th>Idea</th>
                    <th>Votes</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <?php foreach ($votes as $vote): ?>
                        <tr>
                            <td><a href="<?= $vote['idea']->url; ?>"><?= $vote['idea']->title; ?></a></td>
                            <td><?= $vote['number']; ?></td>
                            <td><a href="<?= base_url() . 'action/unvote/' . $vote['id']; ?>">
                                    <button type="submit" class="btn btn-warning btn-sm" style="width:130px"><?= $lang['label_delete_votes']; ?></button>
                                </a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div id="changepasswordtable" style="display:none">
                    <form role="form" name="password-change-form" method="post" action="<?= base_url() . 'action/changepassword' ?>" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label><?= $lang['form_password_old']; ?></label>
                            <input type="password" class="form-control" name="old" style="width:150px" required>
                        </div>
                        <div class="form-group">

                            <label><?= $lang['form_password_new']; ?></label>
                            <div id="password-error-show" style="color:red"></div>
                            <input type="password" class="form-control" name="new" style="width:150px;" minlength="6" required>
                        </div>
                        <div class="form-group">
                            <label><?= $lang['from_password_new_repeat']; ?></label>
                            <input type="password" class="form-control" name="rnew" style="width:150px" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><?= $lang['label_change_password']; ?></button>
                        </div>
                    </form>
                </div>
            </small>
        </div>
    <?php endif; ?>
    <small>
        <ul class="nav nav-tabs">
            <li id="table1" class="active"><a onclick="showtable('activitytable','table1');"><?= $lang['label_activity']; ?></a></li>
            <li id="table2"><a onclick="showtable('ideastable','table2');"><?= $lang['label_ideas']; ?> <span class="badge"><?= count($ideas); ?></span></a></li>
            <li id="table3"><a onclick="showtable('commentstable','table3');"><?= $lang['label_comments']; ?></a></li>
        </ul>
        <div id="listing">
            <table id="activitytable" class="table table-striped">
                <thead>
                <tr>
                    <th><?= $lang['label_log']; ?></th>
                    <th><?= $lang['label_date']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td>
                            <?= $log->content; ?>
                        </td>
                        <td>
                            <?= $log->date; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <table id="ideastable" class="table table-condensed" style="display:none">
                <thead>
                <tr>
                    <th><?= $lang['label_idea']; ?></th>
                    <th><?= $lang['label_category']; ?></th>
                    <th><?= $lang['label_comments']; ?></th>
                    <th><?= $lang['label_votes']; ?></th>
                    <th><?= $lang['label_date']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ideas as $idea): ?>
                    <tr class="<?php
                    switch ($idea->status) {
                        case 'considered':
                            echo 'active';
                            break;
                        case 'declined':
                            echo 'danger';
                            break;
                        case 'started':
                            echo 'success';
                            break;
                        case 'planned':
                            echo 'warning';
                            break;
                        case 'completed':
                            echo 'info';
                            break;
                    }
                    ?>">
                        <td>
                            <a href="<?= $idea->url; ?>"><?= $idea->title; ?></a>
                        </td>
                        <td>
                            <?= $categories[$idea->categoryid]->name; ?>
                        </td>
                        <td>
                            <?= $idea->comments; ?> <?= $lang['label_comments']; ?>
                        </td>
                        <td>
                            <?= $idea->votes; ?> <?= $lang['label_votes']; ?>
                        </td>
                        <td>
                            <?= $idea->date; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <table id="commentstable" class="table table-striped" style="display:none">
                <thead>
                <tr>
                    <th><?= $lang['label_commented']; ?></th>
                    <th><?= $lang['label_date']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td>
                            <a href="<?= $comment['idea']->url; ?>"><?= $comment['idea']->title; ?></a>
                        </td>
                        <td>
                            <?= $comment['date']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </small>
</div>

<script>
    function validateForm() {
        var pass = document.forms["password-change-form"]["new"].value;
        var passVerify = document.forms["password-change-form"]["rnew"].value;

        var errorShowDiv = document.getElementById("password-error-show");

        var passMatchError = "<?= $lang['error_passwords']?>";

        if (pass != passVerify) {
            errorShowDiv.innerHTML = passMatchError;
            return false;
        }

    }
</script>