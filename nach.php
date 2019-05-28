<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
<title>Playing Skill | Журнал для тебя</title>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">

<style>
body{
  background-image: url(images/fonfon.jpg);
  background-repeat: repeat;
} 

table {
   padding-top: 10%;

    margin: auto; /* Выравниваем таблицу по центру окна  */
   }

 td {
    text-align: center; /* Выравниваем текст по центру ячейки */
   }


input {
  width: 98%;
  font-size: 13px;
  padding: 6px 0 4px 10px;
  border: 1px solid #cecece;
  background: #F6F6f6;
  border-radius: 8px;
}
  </style>
 </head>
 <body>


   <div id="centerLayer">


<form action="authorization.php" method="post">
	<fieldset><legend>АВТОРИЗАЦИЯ</legend>
    <table>
        <tr>
            <td><label for="loginField"><h1>Логин</h1></label></td>
            <td><input name="login" placeholder="Логин"></td>
        </tr>
        <tr>
            <td> <label for="loginField"><h1>Пароль</h1></label></td>
            <td><input type="password" name="password" placeholder="Пароль"></td>
              </tr>
        <tr>
          <tr></tr><tr></tr><tr></tr>
            <td colspan="2" style="text-align: center"><input type="submit" class="superbutton" value="Войти"></td>
        </tr>
    </table></fieldset>
</form>



  </div>

  <div id="centerLayer1">



     <form action="registration.php" method="post">
   <fieldset>
    <legend>РЕГИСТРАЦИЯ</legend>
    <p>Логин:  <input name="login" placeholder="Логин"></p>
    <p>Пароль: <input type="password" name="password" placeholder="Пароль"></p>
    <p><input type="submit" class="superbutton1" value="Зарегистрароваться"></p>
   </fieldset>
  </form>



    
  </div>


  </body>
</html>
