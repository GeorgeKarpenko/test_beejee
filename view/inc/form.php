<form action="<?php $_SERVER['REQUEST_URI'] ?>" target="area" method="POST">
  <div class="row">
    <div class="mb-3 col-sm">
      <label for="exampleInputLogin" class="form-label">Имя</label>
      <input name="login" type="login" class="form-control <?php echo count($errors) ? $errors['login'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleInputLogin" aria-describedby="loginHelp" value="<?php echo($post_parameter['login'] ?? '') ?>">
      <?php
      if ($errors['login']) {
      ?>
      <div class="invalid-feedback"><?php echo $errors['login'] ?></div>
      <?php
      }
      ?>
    </div>
    <div class="mb-3 col-sm">
      <label for="exampleInputEmail" class="form-label">email</label>
      <input name="email" type="email" class="form-control <?php echo count($errors) ? $errors['email'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleInputEmail" value="<?php echo($post_parameter['email'] ?? '') ?>">
      <?php
      if ($errors['email']) {
      ?>
      <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
      <?php
      }
      ?>
    </div>
    <div class="mb-3 col-12">
      <label for="exampleFormControlTextarea" class="form-label">Текст задачи</label>
      <textarea name="text" class="form-control <?php echo count($errors) ? $errors['text'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleFormControlTextarea" rows="3"><?php echo($post_parameter['text'] ?? '') ?></textarea>
      <?php
      if ($errors['text']) {
      ?>
      <div class="invalid-feedback"><?php echo $errors['text'] ?></div>
      <?php
      }
      ?>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>