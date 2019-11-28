<!doctype html>
<html>
  <head>
    <style>
      body{
        width:400px;
        padding:1rem;
      }
      .textbar{
        width:100%;
        font-size:12pt;
      }
      #result{
        font-size:12pt;
      }
    </style>
  </head>

  <body>
    <center>
      <input type="text" id="name">
      <a onclick="submit_data()">
        <button>Submit</button>
      </a>
      <div id="result"></div>
      <br>
      good : <div id="good"></div>
      <br>
      bad : <div id="bad"></div>
      <br>
      good_recent : <div id="good_recent"></div>
      <br>
      bad_recent : <div id="bad_recent"></div>
    </center>
  </body>
</html>

<script src="http://code.jquery.com/jquery-2.0.0.js"></script>

<script>
function submit_data(){
  var formData = new FormData();
  formData.append("name", $('#name').val());
  $.ajax({
    url: "/cs489_ce/search.php",
    type: 'POST',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data){
      datalist = data.split("---");
      content = '';
      var i = 0;
      for(i = 0; i < datalist.length - 4; i++)
      {
        content += datalist[i];
      }
      document.getElementById('result').innerText = content;
      document.getElementById('good').innerText = datalist[i];
      document.getElementById('bad').innerText = datalist[i+1];
      document.getElementById('good_recent').innerText = datalist[i+2];
      document.getElementById('bad_recent').innerText = datalist[i+3];
    }
  });
}
$('input[type="text"]').keydown(function() {
  if (event.keyCode == 13){
    submit_data();
  }
});
</script>
