<form action="<?php $_SERVER['REQUEST_URI'] ?>" target="area" method="POST">
  <div class="row">
    <?php echo $errors['validation'] ? '<div class="mb-3 col-12">' . $errors['validation'] . '</div>' : '' ?>
    <div class="mb-3 col-sm">
      <label for="exampleInputLogin" class="form-label">Имя</label>
      <input name="login" type="login" class="form-control <?php echo count($errors) ? $errors['login'] || $errors['validation'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleInputLogin" aria-describedby="loginHelp" value="<?php echo($post_parameter['login'] ?? '') ?>">
      <?php
      if ($errors['login']) {
      ?>
      <div class="invalid-feedback"><?php echo $errors['login'] ?></div>
      <?php
      }
      ?>
    </div>
    <div class="mb-3 col-sm">
      <label for="exampleInputPassword" class="form-label">Пароль</label>
      <input name="password" type="password" class="form-control <?php echo count($errors) ? $errors['password'] || $errors['validation'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleInputPassword" value="<?php echo($post_parameter['password'] ?? '') ?>">
      <?php
      if ($errors['password']) {
      ?>
      <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
      <?php
      }
      ?>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>