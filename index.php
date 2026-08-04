<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if (isset($_GET['toggle_id'])) {
    $id = intval($_GET['toggle_id']);
    $res = $conn->query("SELECT status FROM users WHERE id = $id");
    if ($row = $res->fetch_assoc()) {
        $new_status = ($row['status'] == 1) ? 0 : 1;
        $conn->query("UPDATE users SET status = $new_status WHERE id = $id");
        header("Location: index.php"); 
        exit();
    }
}

$result = $conn->query("SELECT * FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern User List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 700px;
        }

        .form-card {
            background-color: #fbfbfb;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #eee;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-grow: 1;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            min-width: 60px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #5e72e4;
            box-shadow: 0 0 5px rgba(94, 114, 228, 0.2);
            outline: none;
        }

        .btn-submit {
            background-color: #5e72e4;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #324cdd;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        th {
            background-color: #f8f9fe;
            color: #8898aa;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.1em;
            padding: 15px;
            text-align: center;
            font-weight: 700;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #f2f2f2;
            font-size: 14px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        tbody tr:hover {
            background-color: #fdfdfe;
        }

        .btn-toggle {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            background-color: #e9ecef;
            color: #495057;
            border: 1px solid #ced4da;
            transition: all 0.2s ease;
        }

        .btn-toggle:hover {
            background-color: #5e72e4;
            color: white;
            border-color: #5e72e4;
        }

        .no-data {
            text-align: center;
            color: #888;
            padding: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="container">
        <form action="in.php" method="POST" class="form-card">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" required>
            </div>
            
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" style="width: 80px;" placeholder="Age" min="1" max="150" required>
            </div>
            
            <button type="submit" class="btn-submit">Submit</button>
        </form>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="35%">Name</th>
                        <th width="20%">Age</th>
                        <th width="15%">Status</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td style="text-align: left; font-weight: 500;">
                                    <?php echo htmlspecialchars($row['name']); ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['age']); ?></td>
                                <td>
                                    <?php echo htmlspecialchars($row['status']); ?>
                                </td>
                                <td>
                                    <a href="index.php?toggle_id=<?php echo $row['id']; ?>" class="btn-toggle">Toggle</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="no-data">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>