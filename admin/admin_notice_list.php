<?php
ob_start(); // Prevent header already sent errors
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_notice'])) {
    $notice_text = trim($_POST['notice_text']);
    if (!empty($notice_text)) {
        $stmt = $conn->prepare("INSERT INTO notices (notice_text) VALUES (?)");
        $stmt->bind_param("s", $notice_text);
        if ($stmt->execute()) {
            header("Location: admin_notice_list.php?success=1");
            exit();
        } else {
            header("Location: admin_notice_list.php?error=1");
            exit();
        }
    }
}

include "include/header.php";
?>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- MAIN CONTENT WRAPPER -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <!-- Add Notice Form -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Add New Notice</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" id="noticeForm">
                                <div class="form-group mb-3">
                                    <label for="notice_text" class="fw-bold mb-2">Notice Text</label>
                                    <textarea name="notice_text" id="notice_text" class="form-control" rows="4"
                                        placeholder="Enter notice text here."></textarea>
                                    <small class="text-muted">Use the toolbar to bold text, add links, lists, etc. It will show exactly like that on the website.</small>
                                </div>
                                <input type="hidden" name="add_notice" value="1">
                                <button type="submit" class="btn btn-success">Add Notice</button>
                            </form>
                        </div>
                    </div>

                    <!-- List Notices -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h2 class="text-center mb-4">Manage Notices</h2>
                                <table id="noticesTable" class="table table-bordered table-striped bg-white shadow">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 80%;">Notice Content</th>
                                            <th style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC;");
                                        $count = 1;
                                        while ($row = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?= $row['notice_text'] ?></td>
                                                <td>
                                                    <a href="delete_notice.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger delete-btn"
                                                        data-id="<?= $row['id'] ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Turn the plain textarea into a rich-text editor
    let noticeEditor;
    ClassicEditor
        .create(document.querySelector('#notice_text'), {
            toolbar: ['bold', 'italic', 'underline', '|', 'link', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .then(editor => {
            noticeEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Sync CKEditor content back into the real textarea, then validate + submit
    document.getElementById('noticeForm').addEventListener('submit', function(e) {
        e.preventDefault(); // stop default submit so we can validate first

        if (noticeEditor) {
            document.getElementById('notice_text').value = noticeEditor.getData();
        }

        const content = document.getElementById('notice_text').value.trim();

        if (content === '' || content === '<p>&nbsp;</p>') {
            Swal.fire({
                icon: 'warning',
                title: 'Empty Notice',
                text: 'Please enter some notice text before submitting.'
            });
            return;
        }

        // all good — actually submit the form now
        this.submit();
    });

    // Show SweetAlert based on redirect query params
    const params = new URLSearchParams(window.location.search);
    if (params.get('success') === '1') {
        Swal.fire({
            icon: 'success',
            title: 'Notice Added!',
            text: 'Your notice was added successfully.',
            timer: 2000,
            showConfirmButton: false
        });
        // clean the URL so refresh doesn't re-trigger the alert
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (params.get('error') === '1') {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong',
            text: 'Could not add the notice. Please try again.'
        });
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    // Confirm before delete, using SweetAlert instead of confirm()
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            Swal.fire({
                title: 'Delete this notice?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });

    // Initialize DataTable for pagination and search
    $(document).ready(function() {
        $('#noticesTable').DataTable({
            "order": [
                [0, "desc"]
            ],
            "pageLength": 10
        });
    });
</script>

<?php include "include/footer.php"; ?>