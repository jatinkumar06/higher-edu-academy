<?php
include 'include/header.php';
include "connection.php";

/* Fetch all college types under OTHER */
$o = "Other";
$collegeQry = "SELECT * FROM collegetype WHERE coursetype='$o'";
$collegeRun = mysqli_query($conn, $collegeQry);
?>

<div class="container mt-5 mb-5">

    <?php if (mysqli_num_rows($collegeRun) > 0) { ?>

        <div class="section-title-wrapper" id="coursetitle">
            <h2>OTHER AVAILABLE COURSES</h2>
        </div>
    <?php } ?>

    <?php while ($college = mysqli_fetch_assoc($collegeRun)) { ?>

        <div class="course-table mb-5">

            <!-- College Type Header -->
            <div class="course-table-header">
                <?php echo $college['collegetype']; ?>
            </div>

            <!-- Table Body -->
            <div class="course-table-body">
                <?php
                $typeId = $college['id'];
                $subQry = "SELECT * FROM subcourse WHERE collegetypeid='$typeId' ORDER BY id ASC";
                $subRun = mysqli_query($conn, $subQry);

                $left  = [];
                $right = [];
                $index = 0;

                while ($sub = mysqli_fetch_assoc($subRun)) {
                    ($index % 2 == 0) ? $left[] = $sub : $right[] = $sub;
                    $index++;
                }

                $maxRows = max(count($left), count($right));

                for ($i = 0; $i < $maxRows; $i++) {
                ?>
                    <div class="course-row">
                        <div class="course-col">
                            <?php if (!empty($left[$i])) { ?>
                                <a href="subcourse-details.php?id=<?php echo $left[$i]['id']; ?>" class="course-link">
                                    <?php echo $left[$i]['subcourse']; ?>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="course-col">
                            <?php if (!empty($right[$i])) { ?>
                                <a href="subcourse-details.php?id=<?php echo $right[$i]['id']; ?>" class="course-link">
                                    <?php echo $right[$i]['subcourse']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


    <?php } ?>

</div>

<?php include 'include/footer.php'; ?>