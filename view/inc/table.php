<form class="row row-cols-md-auto g-3 align-items-center mt-3" action="<?php $_SERVER['REQUEST_URI'] ?>" target="area" method="GET">
  <div class="col-12">
    <select name="column" class="form-select" aria-label="Default select example">
      <option disabled>Сортировка по столбцу</option>
      <option value="login" <?php echo($get_parameter['column'] == 'login' ? 'selected' :'') ?>>Имени пользователя</option>
      <option value="email" <?php echo($get_parameter['column'] == 'email' ? 'selected' :'') ?>>Email</option>
      <option value="produced" <?php echo($get_parameter['column'] == 'produced' ? 'selected' :'') ?>>Статус</option>
    </select>
  </div>
  <div class="col-12">
    <select name="sort" class="form-select" aria-label="Default select example">
      <option disabled>Сортировка</option>
      <option value="ASC" <?php echo($get_parameter['sort'] == 'ASC' ? 'selected' :'') ?>>По возростанию</option>
      <option value="DESC" <?php echo($get_parameter['sort'] == 'DESC' ? 'selected' :'') ?>>По убыванию</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Отправить</button>
  </div>
</form>
<div class="row mt-3">
  <div class="col-12">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Имя</th>
          <th scope="col">Email</th>
          <th scope="col">Текст</th>
          <th scope="col">Статус</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach ($tasks as $key => $task) {
      ?>
        <tr>
          <th scope="row"><?php echo($task->id) ?> </th>
          <td><?php echo($task->login) ?> </td>
          <td><?php echo($task->email) ?> </td>
          <td><?php echo($task->text) ?> </td>
          <td>
            <?php echo($task->produced) ? 'Выполнено' : 'Не выполнено'?>
            <?php echo($task->updated) ? '<br>Отредактировано администратором' : ''?>
          </td>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
  </div>
  <div class="col-12">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="<?php echo($url .  '?' . http_build_query(array_merge($get_parameter, ['page'=> 1])))?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php
        for ($i=1; $i <= $pages; $i++) {
        ?>
          <li class="page-item <?php echo($page === $i ? 'active' : '') ?>"><a class="page-link" href="<?php echo($url .  '?' . http_build_query(array_merge($get_parameter, ['page'=> $i])))?>"><?php echo($i) ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo($url .  '?' . http_build_query(array_merge($get_parameter, ['page'=> $pages])))?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>