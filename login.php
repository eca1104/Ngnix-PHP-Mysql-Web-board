<?php

session_start();
 ?>
<body>
<h2>Admin's Login Page</h2>
      <form action="login_ok.php" method="POST">
      <fieldset>
      <p>
      <input id="username" name="userid" type="text" placeholder="ID">
      <input id="password" name="userpw" type="password" placeholder="Password">
      </p>
      <input type="submit" value="Login">
      </fieldset>
      </form>
</body>
