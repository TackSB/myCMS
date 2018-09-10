<div class="container">
  <div class="row">
    <div class="col">
      <form action="http://localhost/tack/login/do" method="post">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" name="doLogin">
      </form>
    </div>
    <div class="col">
      <form action="http://localhost/tack/login/change" method="post">
        <input type="text" name="passwordOld" placeholder="Старый пароль">
        <input type="password" name="passwordNew" placeholder="Новый пароль">
        <input type="submit" name="doChange">
      </form>
    </div>
  </div>
</div>