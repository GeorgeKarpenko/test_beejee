<?php
if($task){
?>
  <form action="<?php $_SERVER['REQUEST_URI'] ?>" target="area" method="POST">
    <input type="hidden" name="id" value="<?php echo($task['id']) ?>"></p>
    <div class="row">
      <div class="mb-3 col-sm">
        <label for="exampleInputLogin" class="form-label">Имя</label>
        <input disabled name="login" type="login" class="form-control <?php echo count($errors) ? $errors['login'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleInputLogin" value="<?php echo($task['login'] ?? '') ?>">
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
        <input disabled name="email" type="email" class="form-control <?php echo count($errors) ? $errors['email'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleInputEmail" value="<?php echo($task['email'] ?? '') ?>">
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
        <textarea name="text" class="form-control <?php echo count($errors) ? $errors['text'] ? 'is-invalid' : 'is-valid' : '' ?>" id="exampleFormControlTextarea" rows="3"><?php echo($task['text'] ?? '') ?></textarea>
        <?php
        if ($errors['text']) {
        ?>
        <div class="invalid-feedback"><?php echo $errors['text'] ?></div>
        <?php
        }
        ?>
      </div>
      
      <div class="mb-3 col-12">
        <div class="form-group form-check">
          <input name="produced" type="checkbox" class="form-check-input" value="1" id="exampleProduced" <?php echo($task['produced'] ? 'checked' : '') ?>>
          <label class="form-check-label" for="exampleProduced">Выполнено</label>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
<?php
}
?>