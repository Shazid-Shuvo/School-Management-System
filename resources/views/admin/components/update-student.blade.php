<div class="modal animated zoomIn" id="student-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Student </h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Student Email *</label>
                                <input type="text" class="form-control" id="StudentEmailUpdate">
                                <input type="hidden" id="StudentUpdateID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Student Name *</label>
                                <input type="text" class="form-control" id="StudentNameUpdate">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="student-update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="UpdateStudent()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>

    async function UpdateStudent() {
        let id = document.getElementById('StudentUpdateID').value;
        let name = document.getElementById('StudentNameUpdate').value;
        let email = document.getElementById('StudentEmailUpdate').value;

        // Validate inputs
        if (name.length === 0) {
            return errorToast('Student name is required');
        } else if (email.length === 0) {
            return errorToast('Student email is required');
        }

        document.getElementById('student-update-modal-close').click();
        showLoader();

        try {
            let res = await axios.post("/admin/UpdateStudent", {
                id: id,
                name: name,
                email: email
            });

            hideLoader();

            // Log response for debugging
            console.log("Update response:", res);

            // Check if the response indicates success
            if (res.data && res.data.message === 'success') {
                successToast('Updated successfully');
                await StudentPage(); // Refresh list if update was successful
            } else {
                // Log and display any error message provided in the response
                console.log("Update failed:", res.data.message);
                errorToast('Update failed: ' + (res.data.message || 'Unknown error'));
            }

        } catch (error) {
            hideLoader();
            console.error("Request error:", error.response || error.message);
            errorToast('Something went wrong: ' + (error.response?.data?.message || error.message));
        }
    }

</script>


