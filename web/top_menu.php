<?php
echo '<ul id="navigation" class="nav flex-column flex-sm-row menu-list btn btn-secondary">
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary" role="button" href="/homepage.php">Hobby</a>
        </li>
        <li class="nav-item dropdown flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teach Assignments</a>
          <div class="dropdown-menu">
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/assignments.php">Assignments Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week02/teach02.php">Teach 02 - Web Refresher</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week03/teach03.php">Teach 03 - PHP Forms</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week05/teach05.php">Teach 05 - PHP Database Access</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week06/teach06.php">Teach 06 - PHP Database Update</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week07/signin.php">Teach 07 - PHP Database Login Validation</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="https://protected-cliffs-36729.herokuapp.com/mathForm">Teach 09 - Node Math Calculations</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week11/teach11.php">Teach 11 - AJAX API Data Retrieval</a>
          </div>
        </li>
        <li class="nav-item dropdown flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ponder Assignments</a>
          <div class="dropdown-menu">
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/assignments.php">Assignments Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/homepage.php">Ponder 02 - King\'s Initiative Blog</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week03/browse.php">Ponder 03 - Shopping Cart</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="https://protected-cliffs-36729.herokuapp.com/rateCalc">Ponder 09 - Node Postal Rate Calculator</a>
          </div>
        </li>
        <li class="nav-item dropdown flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Projects</a>
          <div class="dropdown-menu">
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/assignments.php">Assignments Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/project1/rdilogin.php">Project 1 - Red Dragon Inn Tracker</a>
            <a class="dropdown-item menu btn btn-secondary" role="button" href="https://shrouded-sands-83723.herokuapp.com/">Project 2 - Pandemic Tracker</a>
          </div>
        </li>
      </ul>';
?>