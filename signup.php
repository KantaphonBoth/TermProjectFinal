<?php 

    require_once('connection.php');

    if(isset($_POST['signup']))
    {

        if(empty($_POST['FName']) || empty($_POST['LName']) || empty($_POST['Email'])  || empty($_POST['phon']) || empty($_POST['UserName']) || empty($_POST['password']))
        {
            header("location: signupdesign.php?empty");
        }
        else
        {
            $FName=mysqli_real_escape_string($conn,$_POST['FName']);
            $LName=mysqli_real_escape_string($conn,$_POST['LName']);
            $Email=mysqli_real_escape_string($conn,$_POST['Email']);
            $Phone=mysqli_real_escape_string($conn,$_POST['Phon']);
            $UserName=mysqli_real_escape_string($conn,$_POST['UserName']);
            $Password=mysqli_real_escape_string($conn,$_POST['password']);

            if(!preg_match("/^[a-zA-Z]*$/",$FName) || !preg_match("/^[a-zA-Z]*$/",$LName))
            {
                header("location: signupdesign.php?Invalid");
                exit();
            }
            else
            {
                if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
                {
                    header("location: signupdesign.php?VEmail");
                    exit();
                }
                else
                {
                    $query = " select * from users where UserName='".$UserName."'";
                    $result = mysqli_query($conn,$query);

                    if(mysqli_fetch_assoc($result))
                    {
                        header("location: signupdesign.php?User");
                        exit();
                    }
                    else
                    {
                        $query = " select * from users where Email='".$Email."'";
                        $result = mysqli_query($conn,$query);

                        if(mysqli_fetch_assoc($result))
                        {
                            header("location: signupdesign.php?Email");
                            exit();
                        }
                        else
                        {
                            $query = " select * from users where phoneNo='".$Phone."'";
                        $result = mysqli_query($conn,$query);

                        if(mysqli_fetch_assoc($result))
                        {
                            header("location: signupdesign.php?Email");
                            exit();
                        }
                            else
                            {
                                $Hash = password_hash($Password, PASSWORD_DEFAULT);
                                $query = " insert into users (FName,LName,Email,phonNo,UserName,Password) values ('$FName', '$LName', '$Email','$Phone', '$UserName','$Password')";
                                $result = mysqli_query($conn,$query);
                                header("location: signupdesign.php?success");
                                exit();                                
                                
                            }
                        }
                    }
                }
            }
        }

    }
    else
    {
        header("location: index.php");
        exit();
    }

?>