<?php
  require "registration/db_.php";

  $data = $_POST;
  if(isset($data['do_signup']) ) {
    //регистрируем

    if(trim($data['login']) == '')
    {
      $errors[] = 'Введите логин!';
    }

    if($data['email'] == '')
    {
      $errors[] = 'Введите Email!';
    }

    if($data['password'] == '')
    {
      $errors[] = 'Введите пароль!';
    }

    if($data['password_2'] != $data['password'])
    {
      $errors[] = 'Повторный пароль введен неверно!';
    }

     if( R::count('users', "login = ?", array($data['login'])) > 0)
    {
      $errors[] = 'Пользователь с таким логином уже существет!';
    }

    if( R::count('users', "email = ?", array($data['email'])) > 0)
    {
      $errors[] = 'Пользователь с таким Email уже существет!';
    }

    if (empty($errors) )
    {
      //регестрируем,всё хорошо
      $user = R::dispense('users');
      $user->login = $data['login'];
      $user->email = $data['email'];
      $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
      R::store($user);
       echo '<div style="color: green;">Вы успешно зарегестрированы!<br/>Можете перейти на <a href = "/">главную</a> страницу!</div><hr>';
    } else
    {
      echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }

  }
?>

<form action="/signup.php" method="POST">
  <p>
  	 <p><strong>Ваш логин</strong>:</p>
  	 <input type="text" name="login" value="<?php echo @$data['login'];?>">
  </p>

  <p>
  	 <p><strong>Ваш Email</strong>:</p>
  	 <input type="text" name="email" value="<?php echo @$data['email'];?>">
  </p>

  <p>
  	 <p><strong>Ваш пароль</strong>:</p>
  	 <input type="text" name="password" value="<?php echo @$data['password'];?>">
  </p>

  <p>
  	 <p><strong>Введите ваш пароль еще раз</strong>:</p>
  	 <input type="text" name="password_2" value="<?php echo @$data['password_2'];?>">
  </p>
   
   <p>
     <button type="submit" name="do_signup">Зарегистрироваться</button>
   </p>

</form>