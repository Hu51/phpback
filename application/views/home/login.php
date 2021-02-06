<div class="col-md-7">
  <small><ol class="breadcrumb">
        <li><a href="<?= base_url();?>">Feedback</a></li>
        <li class="active"><?= $lang['label_log_in']; ?></li>
  </ol></small>
  <?php if($error == "errorlogin"): ?>
    <p class="bg-danger" style="width:100%;height:35px;padding-left:10px;padding-top:5px;"><?= $lang['error_login']; ?></p>
  <?php elseif ($error == "register") :?>
    <p class="bg-success" style="width:100%;height:35px;padding-left:10px;padding-top:5px;"><?= $lang['text_registration_success']; ?></p>
  <?php elseif($error == "banned"): ?>
    <p class="bg-danger" style="width:100%;height:35px;padding-left:10px;padding-top:5px;"><?= ($ban == -1) ? $lang['error_banned_inf'] : str_replace('%s', $ban, $lang['error_banned']); ?></p>
  <?php endif; ?>
  <form name="login-form" action="<?= base_url() . 'action/login'; ?>" method="POST">
    <div class="form-group">
      <label for="InputEmail"><?= $lang['form_email']; ?></label>
      <input type="email" class="form-control" id="InputEmail" placeholder="<?= $lang['form_email']; ?>" name="email" required>
    </div>
    <div class="form-group">
      <label for="InputPassword"><?= $lang['form_password']; ?></label>
      <input type="password" class="form-control" id="InputPassword" placeholder="<?= $lang['form_password']; ?>" name="password" required>
    </div>
    <label class="checkbox" for="checkbox1">
      <input type="checkbox" value="" id="checkbox1" name="rememberme" data-toggle="checkbox">
        <?= $lang['form_remember']; ?>
    </label>
    <button type="submit" class="btn btn-primary"><?= $lang['label_log_in']; ?></button> <a href="<?= base_url() . 'home/register';?>"><span style="padding-left:10px"><?= $lang['text_create_an_account']; ?></span></a>
  </form>
</div>
<div class="col-md-2"></div>