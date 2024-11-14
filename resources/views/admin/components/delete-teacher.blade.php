<div class="modal animated zoomIn" id="teacher-delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="" readonly id="deleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2"data-bs-dismiss="modal" >Cancel</button>
                    <button onclick="DeleteTeacher()" type="button" id="confirmDelete" class="btn bg-gradient-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function DeleteTeacher() {
        let id = document.getElementById('deleteID').value;
        document.getElementById('delete-modal-close').click();
        showLoader();

        try {
            let res = await axios.post("/admin/DeleteTeacher", {
                id: id
            });

            hideLoader();

            // Check if the request was successful and message is 'success'
            if (res.status === 200 && res.data.message === 'success') {
                successToast('Deleted Successfully');
                await TeacherPage(); // Reload teacher page
            } else {
                errorToast('Something went wrong');
            }
        } catch (error) {
            hideLoader();
            // Handle errors gracefully and log for debugging
            errorToast('Something went wrong. Please try again.');
            console.error('Error:', error);
        }
    }


</script>
