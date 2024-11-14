<div class="modal animated zoomIn" id="student-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">New Student</h6>
            </div>
            <div class="modal-body">
                <form id="student-save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Student Name *</label>
                                <input type="text" class="form-control" id="StudentName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Email*</label>
                                <input type="text" class="form-control" id="StudentEmail">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="student-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="SaveStudent()" id="save-btn" class="btn bg-gradient-success" >Save</button>
            </div>
        </div>
    </div>
</div>


<script>

    async function SaveStudent() {
        let StudentName = document.getElementById('StudentName').value;
        let StudentEmail = document.getElementById('StudentEmail').value;

        if (StudentName.length === 0) {
            errorToast("Teacher Name Required!")
        } else if (StudentEmail.length === 0) {
            errorToast("Email Required!")
        } else {
            document.getElementById('student-modal-close').click();
            showLoader();

            try {
                // Include CSRF token in the Axios request
                let res = await axios.post("/admin/AddStudent", {
                    name: StudentName,
                    email: StudentEmail
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                hideLoader();

                if (res.status === 200) {
                    successToast('Student added successfully');
                    document.getElementById("student-save-form").reset();
                    await StudentPage();
                } else {
                    errorToast("Failed to add teacher!");
                }
            } catch (error) {
                hideLoader();
                console.error("Error:", error);
                errorToast("Error: " + error.message);
            }
        }
    }


</script>
