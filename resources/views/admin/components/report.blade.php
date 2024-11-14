<script>
    async function DashboardPage() {

        $("#Content").empty();
        document.getElementById('Content').innerHTML = `
        <div class="row">
            <!-- Today’s Total Collection -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card h-100 text-white" style="background: linear-gradient(135deg, #ff6b6b, #ff4757); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <div class="card-body d-flex flex-column align-items-start justify-content-center p-4">
                        <div class="row w-100">
                            <div class="col-8">
                                <h5 class="font-weight-bold mb-1">Today's Collection</h5>
                                <h2 class="display-6 font-weight-bold mb-2">$5,000</h2>
                                <p class="text-sm mb-0 font-weight-bold ">Revenue Today</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-dollar-sign fa-3x" style="color: rgba(255, 255, 255, 0.6);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Students -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card h-100 text-white" style="background: linear-gradient(135deg, #1e90ff, #00aaff); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <div class="card-body d-flex flex-column align-items-start justify-content-center p-4">
                        <div class="row w-100">
                            <div class="col-8">
                                <h5 class="font-weight-bold mb-1">Total Students</h5>
                                <h2 class="display-6 font-weight-bold mb-2">1,200</h2>
                                <p class="text-sm mb-0 font-weight-bold ">Enrolled Students</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-user-graduate fa-3x" style="color: rgba(255, 255, 255, 0.6);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Teachers -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card h-100 text-white" style="background: linear-gradient(135deg, #2ed573, #1dd1a1); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <div class="card-body d-flex flex-column align-items-start justify-content-center p-4">
                        <div class="row w-100">
                            <div class="col-8">
                                <h5 class="font-weight-bold mb-1">Total Teachers</h5>
                                <h2 class="display-6 font-weight-bold mb-2">75</h2>
                                <p class="text-sm mb-0 font-weight-bold">Faculty Members</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-chalkboard-teacher fa-3x" style="color: rgba(255, 255, 255, 0.6);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Classes -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card h-100 text-white" style="background: linear-gradient(135deg, #ffa502, #ff7f50); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <div class="card-body d-flex flex-column align-items-start justify-content-center p-4">
                        <div class="row w-100">
                            <div class="col-8">
                                <h5 class="font-weight-bold mb-1">Total Classes</h5>
                                <h2 class="display-6 font-weight-bold mb-2">30</h2>
                                <p class="text-sm mb-0 font-weight-bold">Active Classes</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-school fa-3x" style="color: rgba(255, 255, 255, 0.6);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Subjects -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card h-100 text-white" style="background: linear-gradient(135deg, #5352ed, #3742fa); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <div class="card-body d-flex flex-column align-items-start justify-content-center p-4">
                        <div class="row w-100">
                            <div class="col-8">
                                <h5 class="font-weight-bold mb-1">Total Subjects</h5>
                                <h2 class="display-6 font-weight-bold mb-2">50</h2>
                                <p class="text-sm mb-0 font-weight-bold">Subjects Offered</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-book fa-3x" style="color: rgba(255, 255, 255, 0.6);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Exams -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card h-100 text-white" style="background: linear-gradient(135deg, #ff9f43, #ff6b6b); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <div class="card-body d-flex flex-column align-items-start justify-content-center p-4">
                        <div class="row w-100">
                            <div class="col-8">
                                <h5 class="font-weight-bold mb-1">Total Exams</h5>
                                <h2 class="display-6 font-weight-bold mb-2">15</h2>
                                <p class="text-sm mb-0 font-weight-bold">Scheduled Exams</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-clipboard-list fa-3x" style="color: rgba(255, 255, 255, 0.6);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       `;
    }
</script>
