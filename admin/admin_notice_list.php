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

// Update Notice
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_notice'])) {

    $id = intval($_POST['notice_id']);
    $notice_text = trim($_POST['notice_text']);

    if (!empty($notice_text)) {

        $stmt = $conn->prepare("UPDATE notices SET notice_text=? WHERE id=?");
        $stmt->bind_param("si", $notice_text, $id);

        if ($stmt->execute()) {
            header("Location: admin_notice_list.php?updated=1");
            exit();
        } else {
            header("Location: admin_notice_list.php?update_error=1");
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
                                            <th style="width: 75%;">Notice Content</th>
                                            <th style="width: 20%;">Action</th>
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
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-primary edit-btn"
                                                        data-id="<?= $row['id']; ?>"
                                                        data-notice="<?= htmlspecialchars($row['notice_text'], ENT_QUOTES); ?>">
                                                        Edit
                                                    </button>
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

<!-- Edit Notice Modal -->
<div class="modal fade" id="editNoticeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="POST" id="editNoticeForm">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Notice</h5>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <input type="hidden" name="notice_id" id="edit_notice_id">

                    <textarea
                        id="edit_notice_text"
                        name="notice_text"
                        class="form-control"
                        rows="6"></textarea>

                    <input type="hidden" name="update_notice" value="1">

                </div>

                <div class="modal-footer">

                    <button
                        class="btn btn-secondary"
                        type="button"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button
                        class="btn btn-success"
                        type="submit">
                        Update Notice
                    </button>

                </div>

            </form>

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

    let editEditor;
    ClassicEditor
        .create(document.querySelector('#edit_notice_text'), {
            toolbar: ['bold', 'italic', 'underline', '|', 'link', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .then(editor => {
            editEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    document.querySelectorAll('.edit-btn').forEach(button => {

        button.addEventListener('click', function() {

            const id = this.dataset.id;
            const notice = this.dataset.notice;

            document.getElementById('edit_notice_id').value = id;

            if (editEditor) {
                editEditor.setData(notice);
            }

            let modal = new bootstrap.Modal(document.getElementById('editNoticeModal'));
            modal.show();

        });

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

    // Sync CKEditor content back for edit form, then validate + submit
    document.getElementById('editNoticeForm').addEventListener('submit', function(e) {
        e.preventDefault(); // stop default submit so we can validate first

        if (editEditor) {
            document.getElementById('edit_notice_text').value = editEditor.getData();
        }

        const content = document.getElementById('edit_notice_text').value.trim();

        if (content === '' || content === '<p>&nbsp;</p>') {
            Swal.fire({
                icon: 'warning',
                title: 'Empty Notice',
                text: 'Please enter some notice text before updating.'
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
    } else if (params.get('updated') === '1') {

        Swal.fire({
            icon: 'success',
            title: 'Updated!',
            text: 'Notice updated successfully.',
            timer: 2000,
            showConfirmButton: false
        });

        window.history.replaceState({}, document.title, window.location.pathname);

    } else if (params.get('error') === '1') {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong',
            text: 'Could not add the notice. Please try again.'
        });
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (params.get('update_error') === '1') {
        Swal.fire({
            icon: 'error',
            title: 'Update Failed',
            text: 'Could not update the notice. Please try again.'
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