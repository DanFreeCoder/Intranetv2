 <?php 
    include '../config/clsConnectionIntranet.php';
    include '../objects/clsUsers.php';

    $database = new clsConnectionIntranet();
    $db = $database->connect();

      $users = new Users($db);
      $display_users = $users->view_users();

      while($row=$display_users->fetch(PDO::FETCH_ASSOC))
      {
        if($row['access_type_id'] == 1)
        {
          $role = 'Administrator';
        }
        elseif($row['access_type_id'] == 2)
        {
          $role = 'HR';
        }
        else
        {
          $role = 'Staff';
        }
        
          extract($row);
          echo "<tr>";
          echo "<td><input type='checkbox' value='".$row['id']."' name='form_user' id='form_user' class='form_user'></input></td>";
          echo "<td>{$firstname}</td>";
          echo "<td>{$lastname}</td>";
          echo "<td>{$username}</td>";
          echo "<td>{$role}</td>";
          echo "<td align='center'><a href='#' data-toggle= 'modal' value='".$row['id']."' class='viewUserbyID'><span class='glyphicon glyphicon-fullscreen' tooltip='Expand'></span></a></td>";
          echo "</tr>";
      }
  ?>

