<?php
// Instead of 15, Session shpuld be passed in order to get respective company's details.
$company_id = 15;
include("./homepage/connection.php");
$query = "SELECT u.name as users_name, j.title as jobs_title, aj.applied_date as applied_jobs_date
FROM applied_jobs AS aj
JOIN users AS u ON aj.users_id = u.id
JOIN jobs AS j ON aj.jobs_id = j.id
JOIN company AS c ON j.company_id = c.id WHERE company_id = {$company_id}
;";
$result = mysqli_query($conn, $query);

$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($jobs);
// print_r($jobs);
?>
<table>

    <tr>

        <th>C Name</th>
        <th>Job seeker name</th>
        <th>Applied Date</th>
        <th>CV</th>
    </tr>

    <?php
    foreach ($jobs as $job) : ?>
        <tr>


            <td><?php echo $job['users_name']; ?></td>
            <td><?php echo $job['jobs_title']; ?></td>
            <td><?php echo $job['applied_jobs_date']; ?></td>
            <td>
                <!-- Add a download link for the CV -->
                <a href="<?php echo $job['cv']; ?>" download>Download CV</a>
            </td>

        </tr>
    <?php endforeach ?>
</table>