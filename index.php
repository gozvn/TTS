<html> 
<meta charset="UTF-8">
  <head>
    <title>Text to Speech FPT v1.0 by Gozvn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  <body>
<section class="hero is-dark is-small">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-primary">TEXT TO SPEECH v1.0</h1>
      <form>
        <div class="box">
          <label class="label">API của bạn :</label><input id="api" type="text"><br/>
          <label class="label"> demo API : vOwZuMsDsGa7uYdffN2jt2o1oxK8VzXV </label><br/>
          <textarea placeholder="Nhập nội dung cần chuyển " class="textarea" name="content" id="content" cols="50" rows="20"></textarea><br/>
          <label for="counter-input" class="label">Số kí tự: <span id="counter-display" class="tag is-success">0</span></label>/ 5000<br/>
          <input id="submit" type="button" value="GETLINK" name="submit">
          <button type="button" id="reset1">reset</button>
          <script type="text/javascript">
              document.getElementById('reset1').onclick= function() {
                document.getElementById('content').value="";
              };
          </script>
          <div id="display"></div>
        </div>
      </form>
    </div>
  </div>
</section>
<br/>
<button type="button" id="reloadframe">Tải lại trang link</button>
<script>
            function reload() {
                document.getElementById('framelink').src += '';
            }
            reloadframe.onclick = reload;
</script>
<iframe id="framelink" width="100%" height="480px" src="./link"></iframe>
<script type="text/javascript">
$(document).ready(function(){
  $("#submit").click(function(){
    var text = $("#content").val();
    var api = $("#api").val();
    var dataString = 'text1='+text+'&api1='+api;
    if (text=='' || api==''){
      $("$display").html("Chua nhap Text");
    }else
    {
      $.ajax({
        type:"POST",
        url: "fpt.php",
        data: dataString,
        cache:false,
        success: function(result){
          $("#display").html(result);
        }
      });
    }
    return false;
  });
});
</script>
<script type="text/javascript" >
(() => {
  const counter = (() => {
    const input = document.getElementById('content'),
      display = document.getElementById('counter-display'),
      changeEvent = (evt) => display.innerHTML = evt.target.value.length,
      getInput = () => input.value,
      countEvent = () => input.addEventListener('keyup', changeEvent),
      init = () => countEvent();

    return {
      init: init
    }

  })();

  counter.init();

})();
</script>
  </body>
</html>