<!-- BODY -->
<div class="container">
  <!-- HEADER -->
  <?php req('core/includes/headerSite.php'); ?>
  <!-- END -->
  <!-- CONTENT -->
  <div class="row">
    <form action="http://localhost/tack/news/add" method="post">
      <input type="text" name="caption" placeholder="Заголовок">
      <br>
      <label>Категория новости</label>
      <br>
      <select name="category" size="3">
        <option selected value="other">Другое</option>
        <option value="shoes">Обувь</option>
        <option value="hats">Головные уборы</option>
        <option value="site">Сайт</option>
      </select>
      <br>
      <br>
      <textarea name="discription" rows="3" placeholder="Описание"></textarea>
      <br>
      <input type="submit" name="doAdd">
    </form>
  </div>
  <!-- END -->
  <!-- FOOTER -->
  <?php req('core/includes/footerSite.php'); ?>
  <!-- END -->
</div>
<!-- END -->