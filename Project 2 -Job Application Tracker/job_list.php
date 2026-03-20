<?php
session_start();
include "db.php";

$user_id = $_SESSION['user_id'];
$jobs = mysqli_query($conn, "SELECT * FROM job_applications where user_id='$user_id'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Jobs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        select {
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2>My Job Applications</h2>
    <table>
        <tr>
            <th>Company</th>
            <th>Role</th>
            <th>Status</th>
            <th>Update</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($jobs)) { ?>
            <tr>
                <td><?php echo $row['company']; ?></td>
                <td><?php echo $row['job_role']; ?></td>
                <td><?php echo $row['job_status']; ?></td>
                <td>
                    <form method="post" action="update_status.php">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <select name="job_status">
                            <option value="Applied"
                                <?php if ($row['job_status'] == "Applied") echo "selected"; ?>>
                                Applied
                            </option>

                            <option value="Interview"
                                <?php if ($row['job_status'] == "Interview") echo "selected"; ?>>
                                Interview
                            </option>

                            <option value="Offer"
                                <?php if ($row['job_status'] == "Offer") echo "selected"; ?>>
                                Offer
                            </option>

                            <option value="Rejected"
                                <?php if ($row['job_status'] == "Rejected") echo "selected"; ?>>
                                Rejected
                            </option>
                        </select>

                        <button>Update</button>
                    </form>

                </td>
            </tr>

        <?php } ?>

    </table>
</body>

</html>