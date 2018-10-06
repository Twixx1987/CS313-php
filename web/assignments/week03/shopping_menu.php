<?php
echo '<ul id="navigation" class="nav flex-column flex-sm-row menu-list btn btn-secondary">
		<li class="nav-item flex-sm-fill text-sm-center">
			<a class="nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary" role="button" href="/assignments/week03/browse.php">Home</a>
		</li>
		<li class="nav-item dropdown flex-sm-fill text-sm-center">
			<a class="nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
			<div class="dropdown-menu">
				<a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week03/coffins.php">Coffins</a>
				<a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week03/computers.php">Computers</a>
				<a class="dropdown-item menu btn btn-secondary" role="button" href="/assignments/week03/tools.php">Tools</a>
			</div>
		</li>
        <li class="nav-item flex-sm-fill text-sm-center">
			<a class="nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary" role="button" href="/assignments/week03/cart.php">Cart</a>
		</li>
      </ul>';
?>