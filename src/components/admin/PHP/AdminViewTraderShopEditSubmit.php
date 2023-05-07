<?php
    /*Check if form is submitted*/
    if (isset($_POST['TraderShopEditSubmit'])) 
        {
            include('connect.php');
            /*Check if all fields are filled*/ 
            if (empty($_POST['TraderShopName']) || empty($_POST['TraderShopDescription'])) 
                {
                    header('Location:./AdminViewTraderShopEdit.php?error=Please make sure all text fields are not empty.');
                }

            else
                {
                    $EditShopId = $_POST['EditShopId'];
                    $EditTraderShopName = trim(filter_input(INPUT_POST, 'TraderShopName', FILTER_SANITIZE_STRING));
                    $EditTraderShopDescription = trim(filter_input(INPUT_POST, 'TraderShopDescription', FILTER_SANITIZE_STRING));
                    $alphabetPattern = "/[^a-zA-Z\s]/";
                            if(!preg_match($alphabetPattern,$EditTraderShopName))
                                {
                                    
                                    $UpdateShopQuery = "UPDATE SHOP SET SHOP_NAME=:ShopName, SHOP_DESCRIPTION=:ShopDescription WHERE SHOP_ID=$EditShopId"; 
                                    $RunUpdateShopQuery = oci_parse($conn, $UpdateShopQuery);
                                    oci_bind_by_name($RunUpdateShopQuery, ':ShopName', $EditTraderShopName);
                                    oci_bind_by_name($RunUpdateShopQuery, ':ShopDescription', $EditTraderShopDescription);
                                    oci_execute($RunUpdateShopQuery); 

                                    header('Location:./AdminViewTraderShop Page.php?success=Details successfully updated.');                                     
                                }
                            else
                                {
                                    header('Location:./AdminViewTraderShopEdit.php?error=Please use alphabets only in shop name.');
                                }
                }
        }
?>