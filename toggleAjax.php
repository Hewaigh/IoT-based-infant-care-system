
   <?php
    $mode = $_POST['mode'];

    if ($mode == 'true') //mode is true when button is enabled 
    {
    //Retrive the values from database you want and send using json_encode
    //example
        $message = 'ON';
        $success = 'Enabled';
        echo json_encode(array('message' => $message, '$success' => $success));
    } else if ($mode == 'false')  //mode is false when button is disabled
    {
    //Retrive the values from database you want and send using json_encode
    //example
        $message = 'OFF';
        $success = 'Disabled';
        echo json_encode(array('message' => $message, 'success' => $success));

    }






    $tempMode = $_POST['tempMode'];

    if ($tempMode == 'true') //mode is true when button is enabled 
    {
    //Retrive the values from database you want and send using json_encode
    //example
        $message = 'ON';
        $success = 'Enabled';
        echo json_encode(array('message' => $message, '$success' => $success));
    } else if ($tempMode == 'false')  //mode is false when button is disabled
    {
    //Retrive the values from database you want and send using json_encode
    //example
        $message = 'OFF';
        $success = 'Disabled';
        echo json_encode(array('message' => $message, 'success' => $success));

    }



    ?>