<div class="modal animated zoomIn" id="teacher-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">New Teacher</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Teacher Name *</label>
                                <input type="text" class="form-control" id="teacherName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Email*</label>
                                <input type="text" class="form-control" id="teacherEmail">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
            </div>
        </div>
    </div>
</div>


<script>

    async function Save() {
        let teacherName = document.getElementById('teacherName').value;
        let teacherEmail = document.getElementById('teacherEmail').value;

        if (teacherName.length === 0) {
            errorToast("Teacher Name Required!")
        } else if (teacherEmail.length === 0) {
            errorToast("Email Required!")
        } else {
            document.getElementById('modal-close').click();
            showLoader();

            try {
                // Include CSRF token in the Axios request
                let res = await axios.post("/admin/AddTeacher", {
                    name: teacherName,
                    email: teacherEmail
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                hideLoader();

                if (res.status === 200) {
                    successToast('Teacher added successfully');
                    document.getElementById("save-form").reset();
                    await TeacherPage();
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
