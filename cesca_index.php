<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Move-N Form</title>
</head>
<body>
<!-- START OF NOTES FROM JAY BLICK - TECH SUPPORT @MOVE-N SOFTWARE

Submission URL: https://cptest.move-n.com/api/Lead/LeadInfo
Sender_ID: 849b2101c11b171ca1cb65b27d1119127ee38f2c
Parent_ID: 224 !>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // SENDER ID REQUIRED
        // PARENT ID REQUIRED
        // SOURCE CODE REQUIRED
        // PROPERTY ID REQUIRED

        // FIRST NAME REQUIRED BY MOVE-N, MUST BE LESS THAN 50 CHAR
        if (empty($_POST["first_name"])) {
            $firstNameErr = "First Name is required.";
        } elseif (strlen($_POST["first_name"]) > 50) {
            $firstNameErr = "Max 50 characters.";
        } else {
            $firstName = test_input($_POST["first_name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
                $firstNameErr = "Only letters and white space allowed.";
            }
        }

        // LAST NAME REQUIRED BY MOVE-N, MUST BE LESS THAN 50 CHAR
        if (empty($_POST["last_name"])) {
            $lastNameErr = "Last Name is required.";
        } elseif (strlen($_POST["last_name"]) > 50) {
            $lastNameErr = "Max 50 characters.";
        } else {
            $lastName = test_input($_POST["last_name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                $lastNameErr = "Max 50 characters. Only letters and white space allowed";
            }
        }

        // HOME PHONE CONDITIONAL. IF CELL PHONE AND EMAIL ARE BLANK, THEN HOME PHONE MUST BE PRESENT. MAX 50 CHAR
        // if (empty($_POST["home_phone"])) {
        //     $homePhoneErr = "Home Phone is required";
        // } else {
        //     if (!preg_match_all("/^\+?[0-9\/.()-]{9,}$/",$homePhone)) {
        //         $homePhoneErr = "correct format";
        //         $homePhone = $_POST["home_phone"];
        //     } else {
        //         $homePhoneErr = "incorrect format";
        //         $homePhone = "Home Phone is in incorrect format";
        //     }
        // }

        // if (!preg_match_all("/^\+?[0-9\/.()-]{9,}$/",$homePhone)) {
        //     $homePhoneErr = "i dont know";
        // } else {
        //     $homePhoneErr = "maybe";
        //     $homePhone = test_input($_POST["home_phone"]);
        // }

        // EMAIL CONDITIONAL. IF HOME PHONE AND CELL PHONE ARE BLANK, THEN EMAIL MUST BE PRESENT. MAX 100 CHAR
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // -- START OF ADDRESS --
        // ADDRESS1 NOT REQUIRED MAX 30 CHAR
        if (empty($_POST["address1"])) {
            $address1 = "";
        } elseif (strlen($_POST["address1"]) > 30) {
            $address1Err = "Max 30 characters";
        } else {
            $address1 = test_input($_POST["address1"]);
        }
        // ADDRESS2 NOT REQUIRED MAX 30 CHAR
        if (empty($_POST["address2"])) {
            $address2 = "";
        } elseif (strlen($_POST["address2"]) > 30) {
            $address2Err = "Max 30 characters";
        } else {
            $address2 = test_input($_POST["address2"]);
        }
        // CITY NOT REQUIRED MAX 25 CHAR
        if (empty($_POST["city"])) {
            $city = "";
        } elseif (strlen($_POST["city"]) > 25) {
            $cityErr = "Max 25 characters";
        } else {
            $city = test_input($_POST["city"]);
        }
        // STATE NOT REQUIRED MAX 2 CHAR
        if (empty($_POST["state"])) {
            $state = "";
        } elseif (strlen($_POST["state"]) > 2) {
            $stateErr = "Max 2 characters";
        } else {
            $state = test_input($_POST["state"]);
        }
        // ZIPCODE NOT REQUIRED MAX 10 CHAR
        if (empty($_POST["zipcode"])) {
            $zipcode = "";
        } elseif (strlen($_POST["zipcode"]) > 10) {
            $zipErr = "Max 10 characters";
        } else {
            $zipcode = test_input($_POST["zipcode"]);
        }
        // -- END OF ADDRESS --

        // NOTES NOT REQUIRED MAX 4000 CHAR
        if (empty($_POST["notes"])) {
            $comment = "";
        } elseif (strlen($_POST["notes"]) > 4000) {
            $commentErr = "Max 4000 characters";
        } else {
            $comment = test_input($_POST["notes"]);
        }

        // PROSPECT FIRST NAME REQUIRED MAX 50 CHAR
        if (empty($_POST["prospect_first_name"])) {
            $prospFirstNameErr = "Prospect First Name is required.";
        } else {
            $prospFirstName = test_input($_POST["prospect_first_name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$prospFirstName) || strlen($prospFirstName) > 50) {
                $prospFirstNameErr = "Max 50 characters. Only letters and white space allowed.";
            }
        }
        // PROSPECT LAST NAME REQUIRED MAX 50 CHAR
        if (empty($_POST["prospect_last_name"])) {
            $prospLastNameErr = "Prospect Last Name is required";
        } else {
            $prospLastName = test_input($_POST["prospect_last_name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$prospLastName) || strlen($prospFirstName) > 50) {
                $prospLastNameErr = "Max 50 characters. Only letters and white space allowed";
            }
        }

        // TYPE OF SERVICE NOT REQUIRES MAX 50 CHAR
        if (empty($_POST["type_of_service"])) {
            $typeOfServiceErr = "Type of Service is Required";
        } else {
            $typeOfService = test_input($_POST["type_of_service"]);
        }

    } //--- end of server request post method if statement ---

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
    <h1>Form for Move-N Software</h1>
    <!- https://cptest.move-n.com/api/Lead/LeadInfo-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <fieldset>
            <legend><h2>Lead Information</h2></legend>
            <p>* Required fields</p>
            <div>
                <label for="label_sender_ID">*Sender ID: </label>
                <input id="label_sender_ID" type="text" name="sender_id" value="849b2101c11b171ca1cb65b27d1119127ee38f2c">
            </div>
            <div>
                <label for="label_parent_ID">*Parent ID: </label>
                <input id="label_parent_ID" type="text" name="parent_id" value="224">
            </div>
            <div>
                <label for="label_source_ID" title="Lead ID, we would use it to tie the lead back to any status information">*Source Code: </label>
                <input id="label_source_ID" type="text" name="source_code" value="1">
            </div>
            <div>
                <label for="label_property_ID" title="Unique identifier you have for the community">*Property ID: </label>
                <input id="label_property_ID"  type="text" name="property_id" value="483">
            </div>
            <br>
            <div>
                <label for="label_FN_ID">*First Name: </label>
                <input id="label_FN_ID" type="text" name="first_name" value="Jane">
                <span> <?php echo $firstNameErr;?> </span>
            </div>
            <div>
                <label for="label_LN_ID">*Last Name: </label>
                <input id="label_LN_ID" type="text" name="last_name" value="Doe">
                <span> <?php echo $lastNameErr;?> </span>
            </div>
            <br>
            <div>
                <label for="label_homephone_ID">Home Phone: </label>
                <input id="label_homephone_ID" type="text" name="home_phone" placeholder="___-___-____">
                <span> <?php echo $homePhoneErr;?> </span>
            </div>
            <div>
                <label for="label_cellphone_ID">Cell Phone: </label>
                <input id="label_cellphone_ID" type="text" name="cell_phone" value="">
            </div>
            <div>
                <label for="label_email_ID">Email: </label>
                <input id="label_email_ID" type="text" name="email" value="fsinocruz@yolocare.com">
                <span> <?php echo $emailErr;?> </span>
            </div>
            <br>
            <strong>Mailing Address:</strong>
            <div>
                <label for="label_address1_ID">Address 1: </label>
                <input id="label_address1_ID" type="text" name="address1" value="28202 Cabot Rd">
                <span> <?php echo $address1Err;?> </span>
            </div>
            <div>
                <label for="label_address2_ID">Address 2: </label>
                <input id="label_address2_ID" type="text" name="address2" value="">
                <span> <?php echo $address2Err;?> </span>
            </div>
            <div>
                <label for="label_city_ID">City: </label>
                <input id="label_city_ID" type="text" name="city" value="Laguna Niguel">
            </div>
            <div>
                <label for="label_state_ID">State: </label>
                <input id="label_state_ID" type="text" name="state" value="CA"><br/>
            </div>
            <div>
                <label for="label_zipcode_ID">Zip Code: </label>
                <input id="label_zipcode_ID" type="text" name="zipcode" value="92677">
            </div>
            <br>
            <div>
                <label for="label_note_ID">Where did you hear about our Community? </label><br>
                <textarea name="notes" id="label_note_ID" cols="30" rows="10" maxlength="4000">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </textarea>
            </div>
            <br>
            <div>
                <label for="label_PFN_ID">*Prospect First Name: </label>
                <input id="label_PFN_ID" type="text" name="prospect_first_name" value="Potato">
                <span> <?php echo $prospFirstNameErr;?> </span>
            </div>
            <div>
                <label for="label_PLN_ID">*Prospect Last Name: </label>
                <input id="label_PLN_ID" type="text" name="prospect_last_name" value="Head">
                <span> <?php echo $prospLastNameErr;?> </span>
            </div>
            <br>
            <div>
                <label for="label_typeofservice_ID">Type of Service: </label>
                <select name="type_of_service" id="label_typeofservice_ID">
                    <option value="N/A">-- Choose Service --</option>
                    <option value="Assisted Living">Assisted Living</option>
                    <option value="Independent Living">Independent Living</option>
                    <option value="Short-term Rehab">Short-term Rehab</option>
                    <option value="Long-term skilled nursing care/healthcare center">Long-term skilled nursing care/healthcare center</option>
                </select>
            </div>
            <br>
            <input type="submit" value="submit"><input type="reset" value="reset">
        </fieldset>
    </form>
<?php
    echo "<h2>Input:</h2>";
    echo "Lead Name: " . $firstName . " " . $lastName;
    echo "<br>";
    echo "Phone Number: " . $homePhone;
    echo "<br>";
    echo "Email: " . $email;
    echo "<br> Address: ";
    echo $address1;
    echo $address2;
    echo " " . $city . " " . $state . " " . $zipcode;
    echo "<br> How did you hear about our Community? <br>";
    echo $comment;
    echo "<br>";
    echo "Prospect Name: " . $prospFirstName . " " . $prospLastName;
    echo "<br>";
    echo "Type of Service: " . $typeOfService;
?>

</body>
</html>
