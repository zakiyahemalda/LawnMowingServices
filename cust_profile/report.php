<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Print Invoice</title>
  <link rel="stylesheet" href="w3.css"/>
</head>
<body>
  <div class="container">
    <h2>Booking Service Form</h2>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
  </div>
  <div class="w3-right footer">
    <button id="print" class="w3-button w3-blue">Print this web page</button>
  </div>
    <script src="jquery.min.js"></script>
    <script src="printThis.js"></script>
    <script>
      $('#print').click(function(){
        $('.container').printThis({

          debug: false,
          importCSS: true,
          importStyle: false,
          printContainer: true,
          loadCSS: "http://localhost/rumput/rumputgithub/cust_profile/w3.css",

          pageTitle: "Print My Document 2",
          removeInline: false,
          printDelay: 333,
          header: "<h1 class='w3-center'>Print My Document 2<h1>",
          footer: null,
          formValues: true,
          canvas: false,
          base: false,
          doctypeString: '<!DOCTYPE html>',
          removeScripts: false,
          copyTagClasses: false
        });
      })
    </script>
</body>
</html>