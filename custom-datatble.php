<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23andme";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Pagination configuration
$results_per_page = 10; // Number of records to display per page
// Get current page from URL query string, or set it to 1 if not specified
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the SQL LIMIT starting number for the results on the displaying page
$start_limit = ($page - 1) * $results_per_page;

// Fetch data from database
$sql = '((SELECT * FROM `surnames_file01`) UNION ALL (SELECT * FROM `surnames_file02`) UNION ALL (SELECT * FROM `surnames_file03`) UNION ALL (SELECT * FROM `surnames_file04`)) LIMIT '.$start_limit.','.$results_per_page;
//$sql = "SELECT * FROM your_table_name LIMIT $start_limit, $results_per_page";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Count total number of records in the table
$query = "SELECT COUNT(*) as total FROM `surnames_file01`";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$no = $row['total'];
$query1 = "SELECT COUNT(*) as total FROM `surnames_file02`";
$result1 = $conn->query($query1);
$row1 = $result1->fetch_assoc();
$no1 = $row1['total'];
$query2 = "SELECT COUNT(*) as total FROM `surnames_file03`";
$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();
$no2 = $row2['total'];
$query3 = "SELECT COUNT(*) as total FROM `surnames_file04`";
$result3 = $conn->query($query3);
$row3 = $result3->fetch_assoc();
$no3 = $row3['total'];
$recordsPerPage = 10; // Number of records to display per page
$total_records = $no + $no1 + $no2 + $no3;
//echo "<pre>";print_r($totalPages);exit;

// Calculate total number of pages
$total_pages = ceil($total_records / $results_per_page);
// Close database connection
$conn->close();
// Render the HTML template
?>
<!DOCTYPE html>
<html>
<head>
    <title>Custom Pagination</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Custom Pagination</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Pctapi</th>
                    <th>Pctblack</th>
                    <th>Pctaian</th>
                    <th>Pctwhite</th>
                    <th>Count</th>
                    <th>Pct2prace</th>
                    <th>Pcthispanic</th>
                </tr>
            </thead>
            <tbody>
                <!-- Populate table data dynamically using PHP -->
                <?php 
                    foreach ($data as $row){ 
                        $content = json_decode($row['content'],true);
                        //echo "<pre>";print_r($content);exit;
                    ?>
                    <tr>
                        <td><?php echo $name = (isset($content['census']['NAME'])) ? $content['census']['NAME'] : ''; ?></td>
                        <td><?php echo $surname = (isset($row['surname'])) ? $row['surname']  : ''; ?></td>
                        <td><?php echo $PCTAPI = (isset($content['census']['PCTAPI'])) ?  $content['census']['PCTAPI'] : ''; ?></td>
                        <td><?php echo $PCTBLACK = (isset($content['census']['PCTBLACK'])) ? $content['census']['PCTBLACK']  : ''; ?></td>
                        <td><?php echo $PCTAIAN = (isset($content['census']['PCTAIAN'])) ? $content['census']['PCTAIAN'] : ''; ?></td>
                        <td><?php echo $PCTWHITE = (isset($content['census']['PCTWHITE'])) ? $content['census']['PCTWHITE'] : ''; ?></td>
                        <td><?php echo $COUNT = (isset($content['census']['COUNT'])) ? $content['census']['COUNT'] : ''; ?></td>
                        <td><?php echo $PCT2PRACE = (isset($content['census']['PCT2PRACE'])) ? $content['census']['PCT2PRACE']  : ''; ?></td>
                        <td><?php echo $PCTHISPANIC = (isset($content['census']['PCTHISPANIC'])) ? $content['census']['PCTHISPANIC']  : ''; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Pagination links -->
        <ul class="pagination">
            <?php 
                $j=1;
                for ($i = 1; $i <= $total_pages; $i++){ 
                    if($j == 25){ 
                        $br = '</ul><ul class="pagination">';
                        $j = 0;
                    }else{ 
                        $br = ''; 
                    }
            ?>
                <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php 
                    echo $br; 
                    $j++;
                } 
            ?>
        </ul>
    </div>
</body>
</html>
