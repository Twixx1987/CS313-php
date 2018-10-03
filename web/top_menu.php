<?php
echo '<ul class="nav flex-column flex-sm-row menu-list btn btn-secondary">
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary" role="button" href="/homepage.php">Hobby</a>
        </li>
        <li class="nav-item dropdown flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Assignments</a>
          <div class="dropdown-menu mx-auto">
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/assignments.php">Assignments Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week02/teach02.php">Teach 02</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week03/teach03.php">Teach 03</a>
          </div>
        </li>
      </ul>';
?>