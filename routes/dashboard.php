<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata=$_SESSION['userdata'];
    $groupsdata=$_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color: yellow">Not Voted</b>';
    }
    else{
        $status = '<b style="color: green">Voted</b>';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online-voting-dashboard</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>

<style>
    #back-button{
        padding:5px;
        font-size:15px;
        background-color:#3498db;
        color:white;
        border-radius:5px;
        float:left;
        margin:10px;

    }
    body{
        background-image:url("https://thumbs.dreamstime.com/b/online-vote-tiny-people-character-concept-vector-illustration-suitable-wallpaper-background-card-banner-book-web-landing-167749048.jpg");
    }

    #logout-button{
        padding:5px;
        font-size:15px;
        background-color:#3498db;
        color:white;
        border-radius:5px;
        float:right;
        margin:10px;
    }

    #Profile{
            background-color:red;
            padding:20px;
            width:30%;
            float:left;
            color:white;
        }

    #Group{
        background-color: purple;
            padding:20px;
            width:60%; 
            float:right;
            color:white;
    }

    #votebtn{
        padding:5px;
        font-size:15px;
        background-color:#3498db;
        color:white;
        border-radius:5px;
    }
    #mainpanel{
        padding:10px;
        
    }
    #headerSection{
        padding:10px;
    }
    #voted{
        padding:5px;
        font-size:15px;
        background-color:green;
        color:white;
        border-radius:5px;
    }
    </style>

        <div id="mainSection" style="background-color:green">
            <center>
                <div id="headerSection">
                     <a href="../"><button id="back-button"> Back</button></a>
                     <a href="logout.php"><button id="logout-button">Logout</button></a>
                     <h1>Online Voting System</h1>  
                </div>
            </center>    

                <hr>
             <div id="mainpanel">

                   
             <div id="Profile">
                    <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100"></center><br><br>
                    <b style="color:black"> Name: </b><?php echo $userdata['name']?><br><br>
                    <b style="color:black">Mobile:</b><?php echo $userdata['mobile']?><br><br>
                    <b style="color:black">Address:</b><?php echo $userdata['address']?><br><br>
                    <b style="color:black">Status:</b><?php echo $status?><br><br>
                </div>
                <div id="Group">
                    <?php 
                    if($_SESSION['groupsdata'])
                    {
                              for($i=0;$i<count($groupsdata);$i++)
                              {
                                  ?>
                                <div>
                                <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                                  <b style="color:black" >GROUP Name: </b><?php echo $groupsdata[$i]['name']?> </br></br>
                                  <b style="color:gold" >Vote:</b><?php echo $groupsdata[$i]['votes']?></br></br>
                                  <form action="../api/vote.php" method="POST">
                                      <input type="hidden" name="gvotes"value="<?php echo $groupsdata[$i]['votes']?>">
                                      <input  type="hidden" name="gid"value="<?php echo $groupsdata[$i]['id']?>">
                                     
                                      <?php

                                            if($_SESSION['userdata']['status']==0)
                                            {
                                                ?>
                                                 <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                                 <?php
                                            }
                                            else{
                                                ?>
                                                <button disable type="button" name=""votebtn value="vote" id="voted">Voted</button>
                                            <?php
                                            }
                                             
                                      ?>
           
                                  </form>
                              </div>
                              <hr>
                         <?php
                                }    

                    }
                    else
                    {

                    }
                    ?>
                </div>

             <div>
  
        </div>


     </div>
    
     

</body>
</html>