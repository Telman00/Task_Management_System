@extends('front.layouts')

@section('content')
  
    <div class="d-flex flex-column flex-md-row" style="width: 100%; height: 100vh">
      <!-- Left Sidebar -->
    @include('front.partials.sidebar')

    <!-- Main Content -->
      <div class="main-content flex-grow-1">
        <div class="content">
          <h1>Welcome to Task Management System</h1>
          <!-- Dinamik bölmələr buraya daxil ediləcək -->
          @include('front.sections.task')
          @include('front.sections.project')
          @include('front.sections.company')
          @include('front.sections.calendar')
          <div class="modal fade" id="yearMonthModal" tabindex="-1" aria-labelledby="yearMonthModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="yearMonthModalLabel">Select Year and Month</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table class="table table-bordered">
                    <tbody id="month-table">
                      <!-- Months will be dynamically generated here -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          @include('front.sections.trash')
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
