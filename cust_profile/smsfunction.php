<?php

  if(isset($_POST['send']))
  {

    sendSmsToEsms();



  }

  function sendSmsToEsms()
  {

    $url='https://api.esms.com.my/sms/send';
    $sms=$_POST['telno'];

    $data=array('user'=>'faizal',
                'pass'=>'student123',
                'to'=>$sms,
                'msg'=>'RM0.00 Hi Admin, please check Rumput.com system');

      $options =array(
        'http'=>array(
              'header'=>"Content-type: application/x-www-form-urlencoded; charset=utf-8",
              'method'=>'POST',
              'content'=>http_build_query($data)
        )

      );

      $context=stream_context_create($options);
      $result=file_get_contents($url,false,$context);
      if($result ===FALSE)
      {
        echo "<script type='text/javascript'>alert('SMS could not be sent.')</script>";
        }
        else
         {
          echo "<script type='text/javascript'>alert('SMS have been sent.')</script>";
        }

        var_dump($result);

  }
?>
