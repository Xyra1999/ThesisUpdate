<?php  
    
    require 'connector/connect.php';
    session_start();
    if ($_SESSION['user_email']) {
        $email = $_SESSION['user_email'];
        $search = "SELECT *from profile";
        $result = mysqli_query($conn,$search);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Email'] == $email) {
                // $user_fname = $row['first_name'];
                // $user_mname = $row['middle_name'];
                // $user_lname = $row['last_name'];
                // $user_age = $row['age'];
                // $user_gender = $row['gender'];
                // $user_email = $row['Email'];
                // $user_contact = $row['contact'];
                $user_id = $row['ProfileID'];
                Search_data($user_id);
                break;
            }
        }
    }
    else {
        header("location: index");
        exit();
    }

?>

<?php  
    
    function Search_data($user_id){
        require 'connector/connect.php';
        $all_data_tbl = "SELECT p.ProfileID, p.first_name,p.middle_name,p.last_name,p.age,p.gender,p.Birthdate,p.Birthplace,p.Email,p.contact,adr.city,stu.course,stu.father_name,stu.mother_name,stu.parent_address,stu.StudentID,e.elementary_school_name,e.elementary_year_graduated,e.high_school_graduate,e.high_school_name,e.post_school_graduate,e.post_school_name,e.tertiary_school_graduate,e.tertiary_school_name from profile as p JOIN address as adr ON adr.ProfileID_fk = p.ProfileID JOIN student as stu ON stu.ProfileID_fk = p.ProfileID JOIN education as e ON e.Profile_fk = p.ProfileID WHERE p.ProfileID = $user_id";

            $result = mysqli_query($conn,$all_data_tbl);
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['ProfileID'];
                $user_fname = $row['first_name'];
                $user_mname = $row['middle_name'];
                $user_lname = $row['last_name'];
                $user_age = $row['age'];
                // $user_gender = $row['gender'];
                $user_Birthdate = $row['Birthdate'];
                $user_Birthplace = $row['Birthplace'];
                $user_email = $row['Email'];
                $user_contact = $row['contact'];
                $user_city = $row['city'];
                $user_course = $row['course'];
                // $user_Year = $row['Year'];
                $user_father_name = $row['father_name'];
                $user_mother_name = $row['mother_name'];
                $user_parent_address = $row['parent_address'];
                $user_elementary_school_name = $row['elementary_school_name']; 
                $user_elementary_year_graduated = $row['elementary_year_graduated']; 
                $user_high_school_name = $row['high_school_name']; 
                $user_high_year_graduated = $row['high_school_graduate']; 
                $user_tertiary_school_name  = $row['tertiary_school_name'];
                $user_tertiary_year_graduated = $row['tertiary_school_graduate'];
                $user_post_school_name  = $row['post_school_name'];
                $user_post_year_graduated = $row['post_school_graduate']; 
                All_data($user_id,$user_fname,$user_mname,$user_lname,$user_age,$user_Birthdate,$user_Birthplace,$user_email,$user_contact,$user_city,$user_course,$user_father_name,$user_mother_name,$user_parent_address,$user_elementary_school_name,$user_elementary_year_graduated,$user_high_school_name,$user_high_year_graduated,$user_tertiary_school_name,$user_tertiary_year_graduated,$user_post_school_name,$user_post_year_graduated);
                break;

            }
    }

?>


<?php  
    function All_data($user_id,$user_fname,$user_mname,$user_lname,$user_age,$user_Birthdate,$user_Birthplace,$user_email,$user_contact,$user_city,$user_course,$user_father_name,$user_mother_name,$user_parent_address,$user_elementary_school_name,$user_elementary_year_graduated,$user_high_school_name,$user_high_year_graduated,$user_tertiary_school_name,$user_tertiary_year_graduated,$user_post_school_name,$user_post_year_graduated){
        ?>  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title><?php echo $user_fname." ".$user_lname; ?></title>
                <link rel="stylesheet" href="css/user.css">
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="css/form_box.css">
            </head>
            <body>

            <div class="content">
                <div class="sidebar">
                    <a href="user" style="text-decoration: none;"><img src="image/1.png" alt="Logo" width="150" height="100"><h2>FATHER SATURNINO URIOS UNIVERSITY</h2></a>
                    <ul>
                        <!-- <li><a href="#">Home</a></li> -->
                        <li><a href="#">Notification</a></li>
                        <li><a id="form-grad" style="cursor: pointer;">Applied Graduate Course</a></li> 
                        <li><a href="#">Action Done</a></li>
                        <li><a href="#">Application Form</a></li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul> 
                </div>
                <div class="main_content">
                    <div class="header">
                        <p><b>Name:&nbsp</b><span><?php echo $user_fname." ".$user_lname;?></span></p>
                    </div>  
                    <div class="info">
                        <p>Lorem ipsum, dolor, sit amet consectetur adipisicing elit. Distinctio fugiat architecto molestiae non voluptates dolorem at esse praesentium ullam incidunt ipsum harum ratione assumenda sapiente veniam soluta, tempore ad enim. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit recusandae in laborum unde voluptates quas minima modi distinctio odit. Eligendi, temporibus consequuntur, error a nobis optio tempore sequi. Consectetur, obcaecati. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt impedit neque architecto. Eum dicta et veritatis inventore, modi quam praesentium molestias deserunt, delectus vel nulla doloremque veniam excepturi placeat fugiat.</p>
                  </div>
                </div>
            </div>

            <div class="graduate-form">
                <div class="sign_box">
        <div class="sign_content">
            <center><h2>Father Saturnino Urios University</h2></center>
            <center><h3></h3></center>
            <center><h3>Application for Graduation From Graduate Course</h3></center>
                        <div class="name">
                        <div class="input">
                        <div class="input_flex">
                            <div class="input">
                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Course</label>
                            <br>
                            <input type="text" placeholder="Course" name="lname" value="<?php echo $user_course; ?>">
                        </div>
                        <div class="input_list">
                            <label for="">Last Name</label>
                            <br>
                            <input type="text" placeholder="PSA/NSO Birth Certificate-Family Name" name="lname" value="<?php echo $user_lname; ?>">
                        </div>
                        <div class="input_list">
                            <label for="">First Name</label>
                            <br>
                            <input type="text" placeholder="First Name" name="fname" value="<?php echo $user_fname; ?>">
                        </div>
                        <div class="input_list">
                            <label for="">Middle Name</label>
                            <br>
                            <input type="text" placeholder="Middle Name" name="mname" value="<?php echo $user_mname;  ?>">
                        </div>
                        </div>
                        
                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Date of Birth</label>
                            <br>
                            <input type="text" placeholder="Date of Birth" name="birthdate" value="<?php echo $user_Birthdate;  ?>">
                        </div>
                        <div class="input_list">
                            <label for="">Place of Birth</label>
                            <br>
                            <input type="text" placeholder="Place of Birth" name="place_birth" value="<?php echo $user_Birthplace;  ?>" >
                        </div>
                        <div class="input_list">
                            <label for="">Citizenship </label>
                            <br>
                            <input type="text" placeholder="Citizenship" name="citizenship">
                        </div>
                        </div>

                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Sex</label>
                            <br>
                            <select name="gender" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="input_list">
                            <label for="">Civil Status</label>
                            <br>
                            <select name="cstatus" id="">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="input_list">
                            <label for="">Name of Spouse if Married</label>
                            <br>
                            <input type="text" placeholder="Name of Spouse if Married" name="spouse">
                        </div>
                        </div>

                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Religion</label>
                            <br>
                            <select name="religion" id="">
                                <option value="Roman Catholic">Roman Catholic</option>
                                <option value="INC">INC</option>
                            </select>
                        </div>
                        <div class="input_list">
                            <label for="">Contact Number</label>
                            <br>
                            <input type="text" placeholder="Contact Number" name="contact" value="<?php echo $user_contact; ?>">
                        </div>
                        <div class="email">
                            <label for="">Email Address </label>
                            <br>
                            <input type="text" placeholder="Email Address" name="email" value="<?php echo $user_email; ?>">
                        </div>
                        </div>

                            <div class="input_list">
                            <label for="">Home Address</label> 
                            <br>
                            <input id="home" type="text" placeholder="Home Address" name="home_address" value="<?php echo $user_city; ?>">
                        </div>
                        <hr>
                        <center><span id="title">Parents Details</span></center>
                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Father's Name</label>
                            <br>
                            <input type="text" placeholder="Father's Name" name="father_name" value="<?php echo $user_father_name; ?>">
                        </div>
                        <div class="input_list">
                            <label for="">Mother's Name</label>
                            <br>
                            <input type="text" placeholder="Mother's Name" name="mother_name" value="<?php echo $user_mother_name; ?>">
                        </div>
                        <div class="email">
                            <label for="">Parent Address</label>
                            <br>
                            <input type="text" placeholder="Address" name="parent_address"  value="<?php echo $user_parent_address; ?>">
                        </div>
                        </div>

                        <center><span id="title">Education Background</span></center>
                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Elementary School Graduated</label>
                            <br>
                            <input type="text" placeholder="Elementary School Graduated" name="eschool" value="<?php echo $user_elementary_school_name; ?>">
                        </div>
                        <div class="email">
                            <label for="">Year Graduated</label>
                            <br>
                            <input type="text" placeholder="Year Graduated" name="eyear" value="<?php echo $user_elementary_year_graduated; ?>">
                        </div>
                        </div>

                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">High School Graduated</label>
                            <br>
                            <input type="text" placeholder="High School Graduated" name="hschool" value="<?php echo $user_high_school_name; ?>">
                        </div>
                        <div class="email">
                            <label for="">Year Graduated</label>
                            <br>
                            <input type="text" placeholder="Year Graduated" name="hyear" value="<?php echo $user_high_year_graduated; ?>">
                        </div>
                        </div>

                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Tertiary Graduated</label>
                            <br>
                            <input type="text" placeholder="Tertiary Graduated" name="tgrad" value="<?php echo $user_tertiary_school_name ?>">
                        </div>
                        <div class="email">
                            <label for="">Year Graduated</label>
                            <br>
                            <input type="text" placeholder="Year Graduated" name="tyear" value="<?php echo $user_tertiary_year_graduated; ?>">
                        </div>
                        </div>
                        <div class="input_flex">
                            <div class="input_list">
                            <label for="">Post Graduate</label>
                            <br>
                            <input type="text" placeholder="Post Graduated" name="pgrad" value="<?php echo $user_post_school_name; ?>">
                        </div>
                        <div class="email">
                            <label for="">Year Graduated</label>
                            <br>
                            <input type="text" placeholder="Year Graduated" name="pyear" value="<?php echo $user_post_year_graduated; ?>">
                        </div>
                        </div>
                            <div class="btn">
                                <center><button type="submit" name="Register">Submit</button></center>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            </div>

        <?php
    }


?>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>