<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="/css/fonts.css" type="text/css" media="screen">
      <link rel="stylesheet" href="/css/scrollbar.css" type="text/css" media="all">
      <link rel="stylesheet" href="/css/trailer.css" type="text/css" media="all">
      <link rel="stylesheet" href="/css/sweetalert.css" type="text/css" media="all">
      <link rel="stylesheet" href="/css/styles.css" type="text/css" media="screen">
      <link rel="stylesheet" href="/css/media.css" type="text/css" media="screen">
      <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
      <link href="/css/player-quality.css" rel="stylesheet" type="text/css" />
      <link href="/css/custom.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="/js/trailer.js"></script>
      <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
      
<!-- <script type="text/javascript">
        function goPremium() {
            alert("ok");
            window.location = '/users/premium';
            return;
        }
        $(document).ready(function() {
            $('#videoplayer').bind('contextmenu', function() {
                return false;
            });
        });
        var token_key = "ov9a9jgg8m6mh99oc4so9q20kp";
    </script> -->

    <script>
         var token_key = "<?php echo md5(uniqid(mt_rand(), true))?>";
    </script>