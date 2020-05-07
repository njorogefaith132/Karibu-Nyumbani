<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Managing</title>
    <style>
        table{
            width:100%;
            border-collapse:collapse;
            text-align:left;
        }
        th{
            background-color: #669999;
            border:1px solid white;
            text-align:center;
        }
        td{
            background-color:#99CCFF;
            border:1px solid white;
            text-align:center;
        }
        .body{
            background-color:#66CCFF;
        }
        .edit{
            background-color: green;
            color:white;
            padding: 1px 20px; 
            border-radius:20px; 
        }
        a{
            text-decoration:none;
        }
        .delete{
            background-color: red;
            color:white;
            padding: 1px 20px; 
            border-radius:20px; 
        }
        .for{
            display:flex;
            justify-content:center;
            margin-top:20px;
        }
        .headss{
            background-color: #003300;
            display:flex;
            justify-content:center;
            color:white;
        }
    </style>
    </head>
<body>
    <?php require_once 'process2.php' ;?>
    <div class="headss">
    <h1>MANAGE TENANTS</h1>
    </div>
   
    <div class="row justify-content-centre">
     <table >
     <thead>
        <tr>
        <th>Name</th>
        <th>idnumber</th>
        <th>Number</th>
        <th>Email</th>
        <th colspan="2">action</th>
        
    </tr>
    </thead>
    <?php
    $mysqli= new mysqli('localhost','root','','karibunyumbani') or die(mysqli_error($mysqli));
    $result=$mysqli->query("SELECT Name ,idnumber,Number,Email from management" ) or die($mysql->error);
   // pre_r($result->fetch_assoc())
  
    //$sql= "SELECT Name ,idnumber,Number,Email from personaldetails  ";
  // $result= $conn->  query($sql);
  
   if($result->num_rows >0){
      //fetches the next record
       while($row =$result->fetch_assoc()){?>
           <tr>
           <td><?php echo $row['Name'];?></td>
           <td><?php echo $row['idnumber'];?></td>
           <td><?php echo $row['Number'];?></td>
           <td><?php echo $row['Email'];?></td>
           <td>
           <a class="edit" href="manage2.php?edit=<?php echo $row['idnumber'] ?>">Edit</a>
           <td>
           <a class="delete" href="manage2.php?delete=<?php echo $row['idnumber'] ?>">DELETE</a>
           </td>
           </tr>
        <?php }?>
        <?php
   echo "</table>";
}
   else{
       echo "0 result";
   }
   //$conn ->close();
   ?>
   <?php
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
   ?>
   </div>
   <div class="for">
    <form action="process2.php" method="POST">
    
               <p> TENANTS DETAILS</p><br>
                Name <br> <input type="text" name= "Name" value="<?php echo $Name; ?>"><br>
                <br>
                <?php if($update==true):?>
                ID number  <br> <input type="text" readonly name="idnumber" value="<?php echo $id; ?>"><br>
                <?php else :?>
                ID number  <br> <input type="text" name="idnumber" value="<?php echo $id; ?>"><br>
                <?php endif?>
                
                <br>
                Number<br> <input type="text"  name="Number" value="<?php echo $Number; ?>" min="1" max="20"><br>
                <br>
                Email <br> <input type="email" name="Email" value="<?php echo $Email; ?>"><br>
                <br>
                
                <?php if($update==true):?>
                <button type="delete" class="btn btn-damger" name="update" >Update</button>
                <?php else :?>
                <button type="submit" class="btn btn-primary" name="save" >Save</button>
                <?php endif?>
</form>
</div>
</body>
</html>