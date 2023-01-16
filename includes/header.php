<?php ob_start(); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Books Everywhere</title>

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/index-home.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">

   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById(cname+"rating").value=ab;

      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="images/star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="images/star1.png";
      }
   }

   function count(){

     for(var i=1;i<=5;i++)
     {

       if(document.getElementById("php"+i+"_hidden").src=="images/star2.png")
        {
          count++;
        }
     }
     return count;
   }

</script>


</head>

<body>
