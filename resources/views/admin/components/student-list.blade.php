<script>
    async function StudentPage() {
        $("#Content").empty();
        document.getElementById('Content').innerHTML =`
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card px-5 py-5">
                        <div class="row justify-content-between">
                            <div class="align-items-center col">
                                <h4>Student</h4>
                            </div>
                            <div class="align-items-center col">
                                <button data-bs-toggle="modal" data-bs-target="#student-create-modal"
                                        class="float-end btn m-0 bg-gradient-primary">Create
                                </button>
                            </div>
                        </div>
                        <hr class="bg-secondary"/>
                        <div class="table-responsive">
                            <table class="table" id="tableData">
                                <thead>
                                <tr class="bg-light">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="tableList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>`;


        await StudentList();

        async function StudentList() {
            try {
                showLoader();
                let res = await axios.get("/student-list");
                hideLoader();
                console.log("Response data:", res.data);

                let tableList = $("#tableList");
                let tableData = $("#tableData");

                tableData.DataTable().destroy();
                tableList.empty();

                res.data.forEach(function (item, index) {
                    let row = `<tr>
               <td>${index + 1}</td>
               <td>${item['name']}</td>
               <td>${item['email']}</td>
               <td>
                   <button data-id="${item['id']}" data-name="${item['name']}" data-email="${item['email']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                   <button data-id="${item['id']}" data-name="${item['name']}" data-email="${item['email']}"  class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
               </td>
            </tr>`;
                    tableList.append(row);
                });
                $('.editBtn').on('click', async function () {
                    let id = $(this).data('id');
                    let name = $(this).data('name')
                    let email = $(this).data('email')
                    $("#StudentUpdateID").val(id)
                    $("#StudentNameUpdate").val(name)
                    $("#StudentEmailUpdate").val(email)
                    $("#student-update-modal").modal('show');
                })

                $('.deleteBtn').on('click', function () {
                    let id = $(this).data('id');

                    $("#student-delete-modal").modal('show');
                    $("#StudentDeleteId").val(id);

                })

                new DataTable('#tableData', {
                    order: [[0, 'desc']],
                    lengthMenu: [5, 10, 15, 20, 30]
                });
            } catch (error) {
                console.error("Error fetching data:", error);  // Log full error details
                alert("Error fetching data: " + error.message);  // Show specific error message
            }
        }
    }

</script>