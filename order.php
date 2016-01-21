<?php
require_once 'autoloader.php';
include("includes/common.php");
if (!isset($_SESSION['userSession'])) {
    header("Location: login.php");
}
include("includes/header.php");
?>

<main id="main">
    <form id="order">
        <ul class="order-form">
            <li><h1><?php echo $lang['ORDER_TITLE']; ?></h1></li>
            <li><label><?php echo $lang['FULL_NAME']; ?> <span class="required">*</span></label>
                <input id="fname" type="text" name="fname" class="field-divided"
                       placeholder=<?php echo $lang['FIRSTNAME']; ?> required/>&nbsp;<input id="lname" type="text"
                                                                                            name="lname"
                                                                                            class="field-divided"
                                                                                            placeholder=<?php echo $lang['LASTNAME']; ?> required/>
            </li>
            <li>
                <div id="wrongName" style="display: none"></div>
            </li>
            <li>
                <label><?php echo $lang['EMAIL']; ?> <span class="required">*</span></label>
                <input id="email" type="email" name="email" class="field-long"
                       placeholder=<?php echo $lang['EMAIL']; ?> required/>
            </li>
            <li>
                <label><?php echo $lang['ADDRESS']; ?> <span class="required">*</span></label>
                <input id="street" type="text" name="street" class="field-divided"
                       placeholder=<?php echo $lang['STREET']; ?> required/>&nbsp;<input id="nr" type="text"
                                                                                         name="nr"
                                                                                         class="field-divided"
                                                                                         placeholder=<?php echo $lang['NR']; ?>  required/>
            </li>
            </li>
            <li>
                <label><?php echo $lang['ZIP_CITY']; ?> <span class="required">*</span></label>
                <input id="zip" type="text" name="zip" class="field-divided"
                       placeholder=<?php echo $lang['ZIP']; ?> required/>&nbsp;<input id="city" type="text"
                                                                                      name="city"
                                                                                      class="field-divided"
                                                                                      placeholder=<?php echo $lang['CITY']; ?> required/>
            </li>

            </li>
            <li>
                <label><?php echo $lang['YOUR_ORDER']; ?> <span class="required">*</span></label>
                <textarea id="ordertext" name="ordertext" class="field-long field-textarea"></textarea>
            </li>
            <li><div id="orderfail" style="display: none; color: red;">Please writte a order</div></li>
            <li>
                <button id="btn-send" class="btn btn-default" type="submit"><?php echo $lang['SEND']; ?></button>
            </li>
        </ul>
    </form>
</main>
<script>
    $(document).ready(function () {

        $("#btn-send").click(function () {
            var $fname = $("#fname");
            var $lname = $("#lname");
            var $email = $("#email");
            var $street = $("#street");
            var $nr = $("#nr");
            var $zip = $("#zip");
            var $city = $("#city");
            var $ordertext = $("#ordertext");

            resetStyle();
            if(checkForm($fname, $lname, $email, $street, $nr, $zip, $city, $ordertext)) {
                var fname = $fname.val();
                var lname = $lname.val();
                var email = $email.val();
                var street = $street.val();
                var nr = $nr.val();
                var zip = $zip.val();
                var city = $city.val();
                var ordertext = $ordertext.val();

                $.ajax({
                    url: "save_order.php",
                    type: "POST",
                    dataType: "text",
                    data: {
                        fname: fname,
                        lname: lname,
                        email: email,
                        street: street,
                        nr: nr,
                        zip: zip,
                        city: city,
                        ordertext: ordertext
                    },
                    success: function () {
                        $("input").val('');
                        $("textarea").val('');
                        swal("Thanks!", "Deine Bestellung wurde erfolgreich verschickt!", "success");
                    },
                    error: function () {
                        swal("Hoppla!", "Deine Bestellung wurde nicht verschickt!", "error");
                    }
                });
            }

        });

        function hasOnlyNum($field) {
            var regex = /^\d+$/;
            if(!regex.test($field.val())){
                $field.css('border-color', 'red');
                return false;
            }
            return true;
        }

        function hasOnlyChars($field){
            var regex = /^[a-zA-Z]+$/;
            if(!regex.test($field.val())){
                $field.css('border-color', 'red');
                return false;
            }
            return true;
        }

        function isEmail($email) {
            var regex = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})$/;
            if(!regex.test($email.val())) {
                $email.css('border-color', 'red');
                return false;
            }
            return true;
        }

        function hasOrder($field){
            if($field.val() == "") {
                $field.css('border-color', 'red');
                $('#orderfail').show();
                return false;
            }
            return true;
        }

        function checkForm($firstname, $lastname, $email, $street, $nr, $zip, $city, $order){
            var ok = markEmtpyFields();
            ok = hasOnlyChars($firstname);
            ok = hasOnlyChars($lastname);
            ok = isEmail($email);
            ok = hasOnlyChars($street);
            ok = hasOnlyNum($nr);
            ok = hasOnlyNum($zip);
            ok = hasOnlyChars($city);
            ok = hasOrder($order);
            return ok;
        }

        function markEmtpyFields() {
            var ok = false;
            $(':input[required]:visible').each(function () {
                if ($(this).val().trim() == '') {
                    ok = true;
                    $(this).css('border-color', 'red');
                }
            });
            return ok;
        }

        function resetStyle() {
            $(':input[required]:visible').each(function () {
                $(this).css('border-color', 'white');
            });
            $("textarea").css('border-color', 'white');
            $('#orderfail').hide();
        }

    });
</script>
<?php include("includes/footer.php"); ?>
