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
          <th scope="col">Редактировать</th>
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
          <td>
            <a href="<?php echo($url .  '?' . http_build_query(array_merge($get_parameter, ['update'=> $task->id]))) ?>">
              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>
            </a>
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