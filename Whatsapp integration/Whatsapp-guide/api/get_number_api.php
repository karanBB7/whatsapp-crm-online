<?php
    $module = $_POST['module'];
    $record = $_POST['record'];
    $moduleTableMapping = [
        'Leads' => [
            'column' => 'phone',
            'table' => 'vtiger_leadaddress',
            'identifier' => 'leadaddressid',
        ],
        'Contacts' => [
            'column' => 'phone',
            'table' => 'vtiger_contactdetails',
            'identifier' => 'contactid',
        ],
        'Expense' => [
            'column' => 'cf_1058',
            'table' => 'vtiger_expensecf',
            'identifier' => 'expenseid',
        ],
    ];
    if (isset($moduleTableMapping[$module])) {
        $moduleData = $moduleTableMapping[$module];
        $column = $moduleData['column'];
        $table = $moduleData['table'];
        $identifierColumn = $moduleData['identifier'];

        $db = mysqli_connect("localhost", "root", "", "vtiger");

        if (!$db) {
            $response = ['error' => 'Database connection failed'];
        } else {
            $sql = "SELECT $column FROM $table WHERE $identifierColumn = '$record'";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                $response = ['error' => 'Query failed'];
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $phone = $row[$column];
                    $response = ['phone' => $phone];
                } else {
                    $response = ['error' => 'No matching record found'];
                }
            }

            mysqli_close($db);
        }
    } else {
        $response = ['error' => 'Module not found in mapping'];
    }

header('Content-Type: application/json');
echo json_encode($response);
?>